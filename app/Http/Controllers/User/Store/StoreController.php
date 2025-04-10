<?php
namespace App\Http\Controllers\User\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product\ProductCategory;
use App\Models\StoreSlider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index():View
    {
        $storeSliders = StoreSlider::where('is_active',1)->get();
        $productCategories = ProductCategory::with(['products' => function ($query) {
            $query->where('is_active', true)->orderBy('sort')->with('images');
        }])->get();
        return view('store.pags.index',compact('productCategories', 'storeSliders'));
    }

    public function cart():View
    {
        return view('store.pags.cart');
    }

    public function address():View
    {
        return view('store.pags.address');
    }

    public function place_order(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'address' => 'required|string',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Store the order in the orders table
        $order = Order::create([
            'address' => $request->address,
            'status' => 'pending',  // Order status can be 'pending' initially
        ]);

        // Store the products in the order_products table
        foreach ($request->products as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ]);
        }

        // Return a response
        return response()->json([
            "status"=> 200,
            "success"=> true,
            'message' => 'Order placed successfully!',
            'order_id' => $order->id
        ], 200);
    }





}
