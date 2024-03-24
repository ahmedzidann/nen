<?php
namespace App\ViewModels\ProjectView\Tabs\AboutTabs;

use App\Models\AboutTabs;
use App\Models\Page;
use App\Models\Project;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class AboutTabsViewModel extends ViewModel
{
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
    public  $routeCreatesectionTwo;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new AboutTabs(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.tabproject.about.create',Request()->query());
        $this->routeCreatesectionTwo = route('admin.tabproject.about_sectionTwo',Request()->query());
        $this->routeView = route('admin.tabproject.about.index',Request()->query());
        $this->viewTable = 'tabproject';
        $this->allTabs = Tabs::get();
        $this->tabs = Tabs::where('slug',Request()->tab)->first();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.tabproject.about.store')
            : route('admin.tabproject.about.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
