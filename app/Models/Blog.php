<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'mini_desc',
        'content',
    ];
    protected $fillable = [
        'title',
        'mini_desc',
        'content',
        'banner',
        'video',
        'sort',
        'is_active',
        'show_in_home',
        'published_at',
    ];

    public function categories()
    {
        return $this->belongsToMany(MediaCategory::class, BlogMediaCategory::class, 'blog_id', 'media_category_id');
    }
}
