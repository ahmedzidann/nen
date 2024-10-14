<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductImage extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        'title',

    ];
    protected $fillable = [
        'title',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
