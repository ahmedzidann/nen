<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Translatable\HasTranslations;

class Page extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, HasRoles, InteractsWithMedia;

   public $translatable = ['name','description'];

   protected $fillable = [
      'name',
      'link',
      'description',
      'navbar',
      'footer',
      'status',
      'slug',
      'parent_id',
      'sort',
   ];
   public function parent()
   {
     return $this->belongsTo(self::class, 'parent_id');
   }


   public function childe()
   {
     return $this->hasMany(Page::class,'parent_id','id');
   }


    const STATUS = ['Active','Not Active'];
    Const FOOTER=['Active','Not Active'];
    Const NAVBAR=['Active','Not Active'];

}
