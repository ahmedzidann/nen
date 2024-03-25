<?php
namespace App\Models;
use App\Models\Page;
use App\Models\StaticTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;


class ManyTables extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, InteractsWithMedia;

   public $translatable = [
      'title',
      'subtitle',
      'description',
   ];
   
   protected $fillable = [
      'title',
      'subtitle',
      'description',
      'status',
      'pages_id',
      'item',
      'static_tables_id',
      'sort',
      'since',
      'sharing',
   ];
     const STATUS = ['Active','Not Active'];
       public function Page()
       {
         return $this->belongsTo(Page::class, 'pages_id');
       }
       public function StaticTable()
       {
         return $this->belongsTo(StaticTable::class, 'static_tables_id');
       }
}
