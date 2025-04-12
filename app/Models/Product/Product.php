<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        'name',
        'description',

    ];
    protected $fillable = [
        'name',
        'description',
        'vendor_id',
        'product_category_id',
        'price',
        'main_image',
        'is_active',
        'sort',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function similarProducts()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'product_category_id')
                    ->where('id', '!=', $this->id)
                    ->latest()
                    ->limit(20); // Optional: limit results
    }
}
