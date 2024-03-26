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


class OurTeam extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, InteractsWithMedia;

   public $translatable = [
      'title',
      'name',
      'jop',
   ];
   
   protected $fillable = [
      'title',
      'name',
      'jop',
      'status',
      'item',
      'pages_id',
      'sort',
   ];
     const STATUS = ['Active','Not Active'];
       public function Page()
       {
         return $this->belongsTo(Page::class, 'pages_id');
       }
}
