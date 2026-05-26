<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Models\HomeDocValidation;
use App\Models\HomeDocValidationDetail;
use App\Models\HomeDocValidationItem;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeDocValidationController extends Controller
{
    public function index()
    {
        $record = HomeDocValidation::with('items.details')->first();
        $translation = TranslationKey::get();
        return view('admin.homepage.home_doc_validation.index', compact('record', 'translation'));
    }

    public function create()
    {
        if (HomeDocValidation::exists()) {
            return redirect()->route('admin.homepage.home-doc-validation.index')
                ->with('info', 'Section already exists. Please edit it.');
        }
        $translation = TranslationKey::get();
        $translationFirst = TranslationKey::first();
        return view('admin.homepage.home_doc_validation.create', compact('translation', 'translationFirst'));
    }

    public function store(Request $request)
    {
        if (HomeDocValidation::exists()) {
            return redirect()->route('admin.homepage.home-doc-validation.index')
                ->with('info', 'Section already exists.');
        }

        DB::transaction(function () use ($request) {
            $section = HomeDocValidation::create([
                'title'       => $request->title ?? [],
                'description' => $request->description ?? [],
                'button_text' => $request->button_text ?? [],
                'button_url'  => $request->button_url,
                'is_active'   => $request->is_active ?? 1,
            ]);

            $this->syncItems($section, $request);
        });

        return redirect()->route('admin.homepage.home-doc-validation.index')
            ->with('add', 'Doc Validation section created successfully.');
    }

    public function edit($id)
    {
        $record = HomeDocValidation::with('items.details')->findOrFail($id);
        $translation = TranslationKey::get();
        $translationFirst = TranslationKey::first();
        return view('admin.homepage.home_doc_validation.edit', compact('record', 'translation', 'translationFirst'));
    }

    public function update(Request $request, $id)
    {
        $record = HomeDocValidation::findOrFail($id);

        DB::transaction(function () use ($request, $record) {
            $record->update([
                'title'       => $request->title ?? [],
                'description' => $request->description ?? [],
                'button_text' => $request->button_text ?? [],
                'button_url'  => $request->button_url,
                'is_active'   => $request->is_active ?? 1,
            ]);

            $this->syncItems($record, $request);
        });

        return redirect()->route('admin.homepage.home-doc-validation.index')
            ->with('update', 'Updated successfully.');
    }

    public function itemTemplate(Request $request)
    {
        $idx = (int) $request->query('idx', 0);
        $translation = TranslationKey::get();
        $translationFirst = TranslationKey::first();
        return view('admin.homepage.home_doc_validation.partials.item-template', [
            'item' => null,
            'idx'  => $idx,
            'translation' => $translation,
            'translationFirst' => $translationFirst,
        ]);
    }

    public function deleteItem(Request $request)
    {
        $item = HomeDocValidationItem::find($request->item_id);
        if ($item) {
            if ($item->image) {
                FileUploadHelper::deleteFile($item->image);
            }
            $item->details()->delete();
            $item->delete();
        }
        return response()->json(['message' => 'Deleted']);
    }

    public function deleteDetail(Request $request)
    {
        HomeDocValidationDetail::find($request->detail_id)?->delete();
        return response()->json(['message' => 'Deleted']);
    }

    private function syncItems(HomeDocValidation $section, Request $request): void
    {
        $titles      = $request->input('item_title', []);
        $itemIds     = $request->input('item_id', []);
        $allLangs    = TranslationKey::get();
        $firstLang   = $allLangs->first()->key ?? 'en';

        if (empty($titles[$firstLang])) return;

        foreach ($titles[$firstLang] as $idx => $titleVal) {
            // Build title for all languages
            $titleData = [];
            foreach ($allLangs as $lang) {
                $titleData[$lang->key] = $titles[$lang->key][$idx] ?? '';
            }

            // Handle image upload
            $imagePath = null;
            $imageFile = $request->file("item_image.$idx");
            if ($imageFile && $imageFile->isValid()) {
                $imagePath = FileUploadHelper::uploadFile($imageFile, 'home_doc_validation');
            }

            if (!empty($itemIds[$idx])) {
                $item = HomeDocValidationItem::find($itemIds[$idx]);
                if ($item) {
                    $updateData = ['title' => $titleData, 'sort' => $idx];
                    if ($imagePath) {
                        if ($item->image) FileUploadHelper::deleteFile($item->image);
                        $updateData['image'] = $imagePath;
                    }
                    $item->update($updateData);
                }
            } else {
                $item = HomeDocValidationItem::create([
                    'home_doc_validation_id' => $section->id,
                    'title' => $titleData,
                    'image' => $imagePath,
                    'sort'  => $idx,
                ]);
            }

            // Sync bullet points for this item
            $bullets   = $request->input("item_bullets.$idx", []);
            $bulletIds = $request->input("bullet_id.$idx", []);
            $item->details()->whereNotIn('id', array_filter((array) $bulletIds))->delete();

            $bulletCount = count($bullets[$firstLang] ?? []);
            for ($bIdx = 0; $bIdx < $bulletCount; $bIdx++) {
                $bulletData = [];
                foreach ($allLangs as $lang) {
                    $bulletData[$lang->key] = $bullets[$lang->key][$bIdx] ?? '';
                }
                $existingId = $bulletIds[$bIdx] ?? null;
                if ($existingId) {
                    HomeDocValidationDetail::find($existingId)?->update(['title' => $bulletData, 'sort' => $bIdx]);
                } else {
                    HomeDocValidationDetail::create([
                        'home_doc_validation_item_id' => $item->id,
                        'title' => $bulletData,
                        'sort'  => $bIdx,
                    ]);
                }
            }
        }
    }
}
