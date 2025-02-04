<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class FeatureAdvantagesDetails extends Model
{
    use  HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'sub_title',
    ];

    protected $fillable = [
        'feature_advantage_id',
        'title',
        'sub_title',
        'image',
    ];
}
