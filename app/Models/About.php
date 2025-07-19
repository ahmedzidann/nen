<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class About extends Model implements  HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    public $translatable = ['text'];

    protected $fillable = [
        'text',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link',
        'vk_link',
        'email',
        'telegram_number',
        'whats_number',
        'image_1',
        'image_2',
        'image_3',
        'image_4'
    ];
}
