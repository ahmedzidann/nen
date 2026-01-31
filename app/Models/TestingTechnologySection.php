<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class TestingTechnologySection extends Model
{
    use  HasFactory, HasTranslations;

    public $translatable = [
        'title',
        'description'
     ];

   protected $fillable = [
      'type',
      'main_category_id',
      "sub_category_id",
      "title",
      "description",
      "image_1",
      "image_2",
      "sort",
      "design_section_id",
      "status"

   ];
}
