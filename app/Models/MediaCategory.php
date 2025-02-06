<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MediaCategory extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'mini_desc',
    ];
    protected $fillable = [
        'title',
        'mini_desc',
        'image',
    ];


    public function blogs()
    {
        return $this->belongsToMany(Blog::class, BlogMediaCategory::class, 'media_category_id', 'blog_id');
    }
}
