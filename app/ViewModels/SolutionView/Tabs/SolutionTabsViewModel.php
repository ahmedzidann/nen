<?php
namespace App\ViewModels\SolutionView\Tabs;

use App\Models\AboutTabs;
use App\Models\Page;
use App\Models\Project;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class SolutionTabsViewModel extends ViewModel
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
    public  $solution_id;
    public  $routeCreatesectionTwo;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new AboutTabs(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.tabsolution.create',Request()->query());
        // $this->routeCreatesectionTwo = route('admin.tabsolution.about_sectionTwo',Request()->query());
        $this->routeView = route('admin.tabsolution.index',Request()->query());
        $this->viewTable = 'tabsolution';
        $this->allTabs = Tabs::get();
        $this->tabs = Tabs::where('slug',Request()->tab)
        ->where('type','solution')->first();
        $this->solution_id = Request()->solution_id;
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.tabsolution.store')
            : route('admin.tabsolution.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
