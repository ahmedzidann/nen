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


class Certificate extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, HasRoles, InteractsWithMedia;

   public $translatable = [
        'title'
   ];

   protected $fillable = [
      'category_id',
      'title',
   ];
   public function findus()
       {
         return $this->hasMany(FindUs::class);
       }

    //    public function Page()
    //    {
    //      return $this->belongsTo(Page::class, 'pages_id');
    //    }
}
