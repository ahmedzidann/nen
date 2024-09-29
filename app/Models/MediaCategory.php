<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, BlogMediaCategory::class, 'media_category_id', 'blog_id');
    }
}
