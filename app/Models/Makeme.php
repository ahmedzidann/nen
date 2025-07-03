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


class Makeme extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, InteractsWithMedia;

    protected $table = 'markmes';
   public $translatable = [
      'title',
      'description',
   ];
   
   protected $fillable = [
       'title',
      'description',
      'url',
      'sort',
      'image',
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
