<?php

namespace App\Http\Controllers\Admin\Product;
use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSlider\StoreSliderR;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\StoreSlider;
use App\Models\TranslationKey;
use Yajra\DataTables\Facades\DataTables;
class OrderController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Order::query();
            $language = app()->getLocale();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.orders.show', $row->id) . '" class="btn btn-sm btn-primary me-1">
                                    <i class="bx bx-show"></i> View
                                </a>
                            </div>';
                })
                ->rawColumns(['action']) // Important to render HTML
                ->make(true);
        }

        return view('admin.order.view');
    }


    // public function create()
    // {

    //     return view('admin.product.store_slider.create');
    // }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreSliderR $request)
    // {
    //     $data = $request->validated();

    //     if ($request->hasFile('image')) {
    //         $data['image'] = FileUploadHelper::uploadImage($request->file('image'), 'store-slider');
    //     }

    //     StoreSlider::create($data);

    //     redirect()->route('admin.store_sliders.index')->with('success', 'Success Add Advertisement');
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Success Add Advertisement',
    //         'redirect_url' => route('admin.store_sliders.index'),
    //     ]);
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $order = Order::with(['products'])->find($id);
        $order = Order::with(['products.product', 'products.vendor'])->findOrFail($id);
        return view('admin.order.details' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     $row = StoreSlider::findOrFail($id);
    //     $langs = TranslationKey::get();

    //     return view('admin.product.store_slider.edit', compact('row', 'langs'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(StoreSliderR $request, $id)
    // {
    //     $row = StoreSlider::findOrFail($id);

    //     $data = $request->except(['banner', 'video', 'categories_id']);
    //     if ($request->hasFile('image')) {
    //     $data['image'] = FileUploadHelper::updateFile(
    //         $request->file('image'),
    //         $row->image,
    //         'store-slider'
    //     );
    // }
    //     $row->update($data);

    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Update Advertisement',
    //         'redirect_url' => route('admin.store_sliders.index'),
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // public function bulkDelete(Request $request)
    // {
    //     $ads = StoreSlider::whereIn('id', $request->ids)->get();
    //     foreach ($ads as $ad) {
    //         // Delete banner file if exists
    //         if ($ad->image) {
    //             FileUploadHelper::deleteFile($ad->image);
    //         }

    //     }

    //     StoreSlider::whereIn('id', $request->ids)->delete();

    //     return redirect()->back()->with('success', 'Delete Advertisement');
    // }
}
