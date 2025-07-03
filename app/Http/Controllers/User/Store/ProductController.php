<?php
namespace App\Http\Controllers\User\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\StoreSlider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request):View
    {
        $query = Product::query();
        if ($request->has('categories')) {
            $query->whereIn('product_category_id', $request->input('categories'));
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
        if ($request->filled('sort')) {
            switch ($request->input('sort')) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }
        $products = $query->paginate(15);
        $categories = ProductCategory::withCount('products')->get();
        return view('store.products.index', compact('products', 'categories'));

    }

    public function show($id):View
    {

        $product = Product::with(['images','similarProducts'])->findOrFail($id);
        return view('store.products.show',compact('product'));
    }


}
