<?php
namespace App\Http\Controllers\User\Store;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use Illuminate\Contracts\View\View;


class StoreController extends Controller
{

    public function index():View
    {
        $productCategories = ProductCategory::with('products.images')->get();
        return view('store.pags.index',compact('productCategories'));
    }

    public function cart():View
    {
        return view('store.pags.cart');
    }

    public function address():View
    {
        return view('store.pags.address');
    }




}
