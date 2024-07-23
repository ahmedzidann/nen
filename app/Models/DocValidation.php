<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class DocValidation extends Model implements  HasMedia
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
        'pages_id',
        'childe_pages_id',
    ];
    const STATUS = ['Active','Not Active'];
    public function Page()
    {
        return $this->belongsTo(Page::class, 'pages_id');
    }
    public function Page2()
    {
        //  return $this->belongsTo(Page::class, 'childe_pages_id');
        return $this->belongsTo(Page::class, 'childe_pages_id', 'id');
    }
    public function ChildePage()
    {
        return $this->belongsTo(Page::class, 'childe_pages_id');
    }


    public function scopeActive($q){
        $q->where('status',"active");
    }

    public function details()
    {
        return $this->hasMany(DocValidationDetails::class);
    }


}
