<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Advertisement\AdvertisementRequest;
use App\Models\Advertisement;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Advertisement::query();
            $language = app()->getLocale(); // Get current language

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="blogs_checkbox[]" class="form-check-input blogs_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('mini_desc', function ($row) use ($language) {
                    return $row->translate('mini_desc', $language);
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.advertisements.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.advertisements.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvertisementRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadHelper::uploadImage($request->file('image'), 'advertisements');
        }


        Advertisement::create($data);

        redirect()->route('admin.advertisements.index')->with('success', 'Success Add Advertisement');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Advertisement',
            'redirect_url' => route('admin.advertisements.index'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = Advertisement::findOrFail($id);
        $langs = TranslationKey::get();

        return view('admin.advertisements.edit', compact('row', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvertisementRequest $request, $id)
    {
        $row = Advertisement::findOrFail($id);

        $data = $request->except(['banner', 'video', 'categories_id']);

        $data['image'] = FileUploadHelper::updateFile(
            $request->file('image'),
            $row->image,
            'advertisements'
        );
        $row->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Update Advertisement',
            'redirect_url' => route('admin.advertisements.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        $ads = Advertisement::whereIn('id', $request->ids)->get();
        foreach ($ads as $ad) {
            // Delete banner file if exists
            if ($ad->image) {
                FileUploadHelper::deleteFile($ad->image);
            }

        }

        Advertisement::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Advertisement');
    }
}
