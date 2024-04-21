<?php
namespace App\Models;
use App\Models\Page;
use App\Models\AboutTabs;
use App\Models\ProgramTabs;
use App\Models\HelpTabs;
use App\Models\JoinusTabs;
use App\Models\ProjectArchive;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Project extends Model implements  HasMedia {
    use HasApiTokens, HasFactory, Notifiable, HasTranslations, InteractsWithMedia;
    public $translatable = [
        'title',
        'description',
    ];

     protected $fillable = [
        'title',
        'description',
        'status',
        'pages_id',
        'sort',
    ];

    const STATUS = [ 'Active', 'Not Active' ];

    public function Page() {
        return $this->belongsTo( Page::class, 'pages_id' );
    }
    public function getAbout() {
        return $this->hasMany( AboutTabs::class, 'project_id' )->where('status','Active');
    }
    public function getProgram() {
        return $this->hasMany( ProgramTabs::class, 'project_id' )->where('status','Active');
    }
    public function getHelp() {
        return $this->hasMany( HelpTabs::class, 'project_id' )->where('status','Active');
    }
    public function getJoinus() {
        return $this->hasMany( JoinusTabs::class, 'project_id' )->where('status','Active');
    }
    public function getDocument() {
        return $this->hasMany( ProjectArchive::class, 'project_id' )->where('status','Active');
    }

    public function ChildePage() {
        return $this->belongsTo( Page::class, 'pages_id' );
    }

}
