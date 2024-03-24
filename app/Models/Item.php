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


class Item extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, HasRoles, InteractsWithMedia;

   public $translatable = [
      'name',
      'name_two',
      'title',
      'title_two',
      'label',
      'label_two',
      'button',
      'link',
      'description',
      'bref',
   ];
   
   protected $fillable = [
      'name',
      'name_two',
      'title',
      'title_two',
      'label',
      'label_two',
      'button',
      'link',
      'description',
      'bref',
      'sort',
      'status',
      'type',
      'pages_id',
   ];
     const STATUS = ['Active','Not Active'];
     const TYPE = ['asdsa','asdsa'];
       public function Page()
       {
         return $this->belongsTo(Page::class, 'pages_id');
       }
}
