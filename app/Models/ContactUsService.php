<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;

class ContactUsService extends Model
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
