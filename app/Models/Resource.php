<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Resource extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'title',
        'main_category_id',
        'sub_category_id',
        'type',
        'resource',
        'status',
    ];
}
