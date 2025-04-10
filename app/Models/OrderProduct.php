<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'order_id', 'quantity'];

    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
