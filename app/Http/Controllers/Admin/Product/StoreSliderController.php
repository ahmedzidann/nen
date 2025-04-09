<?php

namespace App\Http\Controllers\Admin\Product;
use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSlider\StoreSliderR;
use Illuminate\Http\Request;
use App\Models\StoreSlider;
use App\Models\TranslationKey;
use Yajra\DataTables\Facades\DataTables;
class StoreSliderController extends Controller
{
    
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = StoreSlider::query();
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
                                <a href="' . route('admin.store_sliders.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.product.store_slider.view');
    }

    public function create()
    {
        
        return view('admin.product.store_slider.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderR $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = FileUploadHelper::uploadImage($request->file('image'), 'advertisements');
        }


        StoreSlider::create($data);

        redirect()->route('admin.store_sliders.index')->with('success', 'Success Add Advertisement');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Advertisement',
            'redirect_url' => route('admin.store_sliders.index'),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $row = StoreSlider::findOrFail($id);
        $langs = TranslationKey::get();

        return view('admin.product.store_slider.edit', compact('row', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSliderR $request, $id)
    {
        $row = StoreSlider::findOrFail($id);

        $data = $request->except(['banner', 'video', 'categories_id']);
        if ($request->hasFile('image')) {
        $data['image'] = FileUploadHelper::updateFile(
            $request->file('image'),
            $row->image,
            'advertisements'
        );
    }
        $row->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Update Advertisement',
            'redirect_url' => route('admin.store_sliders.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function bulkDelete(Request $request)
    {
        $ads = StoreSlider::whereIn('id', $request->ids)->get();
        foreach ($ads as $ad) {
            // Delete banner file if exists
            if ($ad->image) {
                FileUploadHelper::deleteFile($ad->image);
            }

        }

        StoreSlider::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Advertisement');
    }
}
