<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Models\FindUs;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductImage;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::query();
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
                ->editColumn('name', function ($row) use ($language) {
                    return $row->translate('name', $language);
                })
                ->editColumn('created_at', function ($row) use ($language) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.products.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.product.products.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProductCategory::get();
        $vendors = FindUs::get();
        return view('admin.product.products.create', compact('categories', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data = collect($data)->except(['images', 'titles'])->toArray();

        DB::beginTransaction();

        try {
            // Handle main image upload
            if ($request->hasFile('main_image')) {
                $data['main_image'] = FileUploadHelper::uploadImage($request->file('main_image'), 'products');
            }

            // Create the product
            $product = Product::create($data);
            // Handle additional images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    $path = FileUploadHelper::uploadImage($image, 'products');
                    $product->images()->create([
                        'image' => $path,
                        'title' => $request->titles[$index] ?? '',
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Product added successfully',
                'redirect_url' => route('admin.products.index'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while adding the product: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::get();
        $langs = TranslationKey::get();
        $vendors = FindUs::get();
        $product->load(['images', 'category']);
        return view('admin.product.products.edit', compact('product', 'categories', 'langs', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data = collect($data)->except(['images', 'titles', 'removed_images'])->toArray();

        DB::beginTransaction();

        try {
            // Handle main image update
            if ($request->hasFile('main_image')) {
                // Delete old main image if it exists
                if ($product->main_image) {
                    FileUploadHelper::deleteFile($product->main_image);
                }
                $data['main_image'] = FileUploadHelper::uploadImage($request->file('main_image'), 'products');
            }
            // Update the product
            $product->update($data);

// Handle additional images
            $existingImageIds = $product->images->pluck('id')->toArray();
            $updatedImageIds = $request->keys ?? [];
            $imagesToDelete = array_diff($existingImageIds, $updatedImageIds);

// Delete removed images
            foreach ($imagesToDelete as $imageId) {
                $image = ProductImage::find($imageId);
                if ($image) {
                    FileUploadHelper::deleteFile($image->image);
                    $image->delete();
                }
            }

            // Update or create images
            if ($request->has('titles')) {
                foreach ($request->titles as $index => $title) {
                    $imageData = [
                        'title' => $title, // Assuming 'en' is always present
                    ];

                    if (isset($request->images[$index])) {
                        $imageData['image'] = FileUploadHelper::uploadImage($request->images[$index], 'products');
                    }

                    if (isset($request->keys[$index])) {
                        // Update existing image
                        ProductImage::where('id', $request->keys[$index])->update($imageData);
                    } else {
                        // Create new image
                        $product->images()->create($imageData);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Product updated successfully',
                'redirect_url' => route('admin.products.index'),
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while updating the product: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        DB::beginTransaction();

        try {
            $products = Product::whereIn('id', $request->ids)->with('images')->get();

            foreach ($products as $product) {
                // Delete main image if it exists
                if ($product->main_image) {
                    FileUploadHelper::deleteFile($product->main_image);
                }

                // Delete additional images
                foreach ($product->images as $image) {
                    if ($image->image) {
                        FileUploadHelper::deleteFile($image->image);
                    }
                    $image->delete();
                }

                // Delete the product
                $product->delete();
            }

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Products deleted successfully',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 500,
                'message' => 'An error occurred while deleting products. Please try again or contact support.',
            ], 500);
        }
    }

    public function deleteImage(Request $request)
    {
        $image = ProductImage::findOrFail($request->image_id);

        if ($image->image) {
            FileUploadHelper::deleteFile($image->image);
        }

        $image->delete();
        
        return response()->json([
            'status' => 200,
            'message' => 'Image deleted successfully',
        ]);

    }
}
