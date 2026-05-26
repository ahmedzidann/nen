<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeVideo extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'home_videos';

    public $translatable = [
        'title',
        'description',
        'button_text',
    ];

    protected $fillable = [
        'youtube_url',
        'title',
        'description',
        'button_text',
        'button_url',
        'is_active',
    ];
}
