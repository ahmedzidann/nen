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

class Ngo extends Model implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasTranslations, InteractsWithMedia;

    protected $table = 'ngo';

    public $translatable = [
        'title',
        'subtitle',
        'description',
        'home_description',
        'first_button',
        'second_button',
    ];

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'home_description',
        'item',
        'status',
        'pages_id',
        'childe_pages_id',
        'sort',
        'show_in_home',
        'image',
        'first_button',
        'second_button',
        'section_id',
        'url_first_button',
        'url_second_button',
    ];

    const STATUS = ['Active', 'Not Active'];

    public function Page()
    {
        return $this->belongsTo(Page::class, 'pages_id');
    }

    public function Page2()
    {
        return $this->belongsTo(Page::class, 'childe_pages_id', 'id');
    }

    public function ChildePage()
    {
        return $this->belongsTo(Page::class, 'childe_pages_id');
    }

    public function scopeActive($q)
    {
        $q->where('status', 'Active');
    }
}
