<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StoreSlider extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'mini_desc',
    ];
    protected $fillable = [
        'title',
        'mini_desc',
        'link',
        'image',
        'is_active',
    ];
}
