<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductCategory extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        'title',

    ];
    protected $fillable = [
        'title',
        "show_in_main",
        "is_featured",
        'main_image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
