<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUsCountry extends Model
{
    use HasTranslations, InteractsWithMedia;

   public $translatable = [
      'country',
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
