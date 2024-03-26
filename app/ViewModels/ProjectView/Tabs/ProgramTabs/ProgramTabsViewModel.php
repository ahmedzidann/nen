<?php
namespace App\ViewModels\ProjectView\Tabs\ProgramTabs;

use App\Models\AboutTabs;
use App\Models\Page;
use App\Models\ProgramTabs;
use App\Models\Project;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class ProgramTabsViewModel extends ViewModel {
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

    public function __construct( $StaticTable = null ) {

        $this->StaticTable = is_null( $StaticTable ) ? new ProgramTabs( old() ) : $StaticTable;
        $this->type = is_null( $StaticTable )?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route( 'admin.tabproject.program.create', Request()->query() );
        $this->routeView = route( 'admin.tabproject.program.index', Request()->query() );
        $this->viewTable = 'program';
        $this->allTabs = Tabs::get();
        $this->tabs = Tabs::where( 'slug', Request()->tab )->first();
    }

    public function action(): string {
        return is_null( $this->StaticTable->id )
        ? route( 'admin.tabproject.program.store' )
        : route( 'admin.tabproject.program.update', $this->StaticTable->id );
    }

    public function method(): string {
        return is_null( $this->StaticTable->id ) ? 'POST' : 'PUT';
    }

}