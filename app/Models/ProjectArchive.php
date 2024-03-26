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

class ProjectArchive extends Model implements  HasMedia {
    use HasApiTokens, HasFactory, Notifiable, HasTranslations, InteractsWithMedia;
    public $table = 'project_archieve';
    public $translatable = [
        'title',
        'description',
        'url',
        'type',
        'image'

    ];

    protected $guarded = [];

    public function Tabs() {
        return $this->belongsTo( Tabs::class, 'tabs_id' );
    }

    public function Project() {
        return $this->belongsTo( Project::class, 'project_id' );
    }

}