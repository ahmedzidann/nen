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


class FindUs extends Model implements  HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,HasTranslations, HasRoles, InteractsWithMedia;

   public $translatable = [
        // 'title'
   ];

   protected $fillable = [
      'code',
      'name',
      'phone',
      'email',
      "level_id",
      'address',
      'location',
      'pos',
      'status',
      "page_id",
      "certificate_id",
      "specialization_id",
      "state_id",
      "join_date",
      "end_date",
      "start_date",
      "user_comment",
      "admin_comment",
      "lng",
      "lat",

   ];

       public function state()
       {
         return $this->belongsTo(State::class);
       }
}
