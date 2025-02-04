<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SidebarResource extends Model
{
    use HasFactory, HasTranslations;
    public $translatable = [
        'title',
        'sub_title',
    ];

    protected $fillable = [
        'title',
        'sub_title',
        'url',
        'main_category',
        'sub_category',
        'type',
        'resource',
        'status',
        'show_in_home',
    ];
}
