<?php
namespace App\Models;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;


class SolutionTabFile extends Model
{
    use  HasFactory, HasTranslations;

    public $translatable = [
        'title',
     ];




   protected $fillable = [
      'file',
      'tab_id',
      "title"

   ];



}
