<?php
namespace App\Models;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;


class State extends Model
{
    use HasApiTokens, HasFactory,HasTranslations ;

   public $translatable = [
        'title'
   ];

   protected $fillable = [
      'title',
      "country_id"
   ];

       public function country()
       {
         return $this->belongsTo(Country::class);
       }
}
