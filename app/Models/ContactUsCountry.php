<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUsCountry extends Model  implements  HasMedia
{
    use HasTranslations, InteractsWithMedia;

   public $translatable = [
      'country',
      'name',
        'title',
        'address'
   ];
        protected $fillable = [
        'country',
        'name',
        'lat',
        'lng',
        'address',
        'phone',
        'type',
        'from_at',
        'to_at',
    ];
}
