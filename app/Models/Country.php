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

class Country extends Model implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasTranslations, HasRoles, InteractsWithMedia;

    public $translatable = [
        'title',
    ];

    protected $fillable = [
        'flag',
        'title',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function offices()
    {
      return $this->hasMany(ContactUsCountry::class, 'country_id');
    }
}
