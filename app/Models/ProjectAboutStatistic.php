<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class ProjectAboutStatistic extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;
    public $translatable = [
        'title',
    ];
    protected $fillable = [
        'title',
        'value',
        'project_id',
        'tab_id',
        'sort',
        'status',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function tab()
    {
        return $this->belongsTo(Tabs::class, 'tab_id');
    }
}
