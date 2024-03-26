<?php
namespace App\Models;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;


class HelpTabs extends Model implements  HasMedia
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
      'project_id',
      'tabs_id',
      'type',
      'sort',
      'email',
      'phone',
   ];
     const STATUS = ['Active','Not Active'];
 
       public function Tabs()
       {
         return $this->belongsTo(Tabs::class, 'tabs_id');
       }
       public function Project()
       {
         return $this->belongsTo(Project::class, 'project_id');
       }
       
}
