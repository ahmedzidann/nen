<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;


class SolutionTab extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, InteractsWithMedia;

   public $translatable = [
    'title',
    'description',
   ];

   protected $fillable = [
      'title',
      'description',
      "tabs_id",
      "solution_id",
      "status"
   ];

   public function links()
   {
     return $this->hasMany(SolutionTabReference::class,'tab_id');
   }

   public function files()
   {
     return $this->hasMany(SolutionTabFile::class,'tab_id');
   }

   public function scopeActive($q){
    $q->where('status',"active");
    }

}
