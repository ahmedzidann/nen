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


class StaticTable extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, InteractsWithMedia;

   public $translatable = [
      'title',
      'description',
      'subtitle',
      'subsubtitle',
      'button',
      'url',
      'url_two',
      'years_text',
      'button_two',

   ];

   protected $fillable = [
      'title',
      'subsubtitle',
      'description',
      'status',
      'item',
      'pages_id',
      'childe_pages_id',
      'sort',
      'icon',
      'subtitle',
      'button',
      'url',
      'years',
      'month',
      'years_text',
      'button_two',
      'url_two',
      'city',
      'job_type',
      'salary',
   ];
    const STATUS = ['Active','Not Active'];
    public function Page()
    {
        return $this->belongsTo(Page::class, 'pages_id');
    }
    public function ChildePage()
    {
        return $this->belongsTo(Page::class, 'childe_pages_id');
    }

    public function scopeActive($q){
        $q->where('status',"active");
    }

    public function identityAttributes()
    {
        return $this->hasMany(IdentityAttribute::class, 'identity_id');
    }
}
