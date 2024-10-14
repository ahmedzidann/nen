<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCategoryRequest;
use App\Models\Product\ProductCategory;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductCategory::query();
            $language = app()->getLocale(); // Get current language

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="checkbox[]" class="form-check-input blogs_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('created_at', function ($row) use ($language) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.product-categories.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.product.product_categories.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.product_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        $category = ProductCategory::create($request->validated());

        redirect()->route('admin.product-categories.index')->with('success', 'Success Add Product Category');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Blog',
            'redirect_url' => route('admin.product-categories.index'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        $langs = TranslationKey::get();
        return view('admin.product.product_categories.edit', compact('productCategory', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Update Product Category',
            'redirect_url' => route('admin.product-categories.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        ProductCategory::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Product Category');
    }
}
