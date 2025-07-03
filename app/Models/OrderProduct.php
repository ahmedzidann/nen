<?php
namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'order_id', 'quantity','vendor_id'];

    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
{
    return $this->belongsTo(Product::class);
}

    public function vendor()
    {
        return $this->belongsTo(FindUs::class);
    }
}
