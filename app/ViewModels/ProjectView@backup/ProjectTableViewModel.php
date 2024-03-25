<?php
namespace App\ViewModels\ProjectView;

use App\Models\Page;
use App\Models\Project;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class ProjectTableViewModel extends ViewModel
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

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new Project(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.project.create',Request()->query());
        $this->routeView = route('admin.project.index',Request()->query());
        $this->viewTable = 'Project';
        $this->allPage = Page::where('slug',Request()->category)->first()->childe;
        $this->allTabs = Tabs::get();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.project.store')
            : route('admin.project.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
