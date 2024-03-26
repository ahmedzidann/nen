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


class Education extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, InteractsWithMedia;

   public $translatable = [
      'title',
      'description',
   ];

   protected $fillable = [
      'title',
      'description',
      'status',
      'pages_id',
      'childe_pages_id',
      'sort',
   ];
     const STATUS = ['Active','Not Active'];
       public function Page()
       {
         return $this->belongsTo(Page::class, 'pages_id');
       }
       public function Page2()
       {
        //  return $this->belongsTo(Page::class, 'childe_pages_id');
         return $this->belongsTo(Page::class, 'childe_pages_id', 'id');
       }
       public function ChildePage()
       {
         return $this->belongsTo(Page::class, 'childe_pages_id');
       }

       public function links()
       {
         return $this->hasMany(EducationReference::class);
       }

       public function files()
       {
         return $this->hasMany(EducationFile::class);
       }

}
