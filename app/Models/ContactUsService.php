<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class ContactUsService extends Model  implements  HasMedia
{
    use HasTranslations, InteractsWithMedia;

    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'title',
        'email',
    ];
}
