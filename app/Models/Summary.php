<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Summary extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    public $translatable = [
        'title',
        'description',
    ];

    protected $fillable = [
        'title',
        'description',
        'image',
        'pages_id',
        'childe_pages_id',
        'status',
        'sort',
    ];
    const STATUS = ['Active', 'Not Active'];

    public function page()
    {
        return $this->belongsTo(Page::class, 'pages_id');
    }
    public function chiled()
    {
        return $this->belongsTo(Page::class, 'childe_pages_id');
    }
    public function links()
    {
        return $this->hasMany(SummaryReference::class);
    }

    public function files()
    {
        return $this->hasMany(SummaryDetails::class);
    }
}
