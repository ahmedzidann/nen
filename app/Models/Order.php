<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'status'];

    // Relationship with OrderProduct
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
