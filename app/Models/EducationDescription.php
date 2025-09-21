<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class EducationDescription extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    public $translatable = [
        'description',
    ];

    protected $fillable = [
        'page_id',
        'description',
        'type',
        'sub_page_id',
        'image',
    ];

    public function education()
    {
        return $this->belongsTo(Page::class, 'page_id', 'id');
    }
    public function sub_pages()
    {
        return $this->belongsTo(Page::class, 'sub_page_id', 'id');
    }
}
