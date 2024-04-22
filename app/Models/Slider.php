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

class Slider extends Model implements  HasMedia {
    use HasApiTokens, HasFactory, Notifiable, HasTranslations, InteractsWithMedia;
    public $table = 'slider';

    public $guarded = [];
    public $translatable = [
        'title',
        'description',
    ];

    public function Pages() {
        return $this->belongsTo( Page::class, 'page_id' );
    }
}
