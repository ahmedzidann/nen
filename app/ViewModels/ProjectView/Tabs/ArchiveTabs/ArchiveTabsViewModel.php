<?php
namespace App\ViewModels\ProjectView\Tabs\ArchiveTabs;

use App\Models\AboutTabs;
use App\Models\Page;
use App\Models\ProgramTabs;
use App\Models\Project;
use App\Models\ProjectArchive;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Illuminate\View\View;
use Spatie\ViewModels\ViewModel;

class ArchiveTabsViewModel extends ViewModel {
    public  $StaticTable;
    public  $type;
    public  $translation;
    public  $translationFirst;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;
    public  $allPage;
    public  $allTabs;
    public  $tabs;
    public $getTypes = [ 'pdf'=>'PDF', 'image'=>'Image', 'url'=>'URL' ];

    public function __construct( $StaticTable = null ) {

        $this->StaticTable = is_null( $StaticTable ) ? new ProjectArchive( old() ) : $StaticTable;
        $this->type = is_null( $StaticTable )?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route( 'admin.tabproject.archive.create', Request()->query() );
        $this->routeView = route( 'admin.tabproject.archive.index', Request()->query() );
        $this->viewTable = 'archive';
        $this->allTabs = Tabs::get();
        $this->tabs = Tabs::where( 'slug', Request()->tab )->first();
    }

    public function action(): string {
        return is_null( $this->StaticTable->id )
        ? route( 'admin.tabproject.archive.store' )
        : route( 'admin.tabproject.archive.update', $this->StaticTable->id );
    }

    public function method(): string {
        return is_null( $this->StaticTable->id ) ? 'POST' : 'PUT';
    }

}