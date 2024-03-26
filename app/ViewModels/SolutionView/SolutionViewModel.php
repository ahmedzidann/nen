<?php
namespace App\ViewModels\SolutionView;

use App\Models\Page;
use App\Models\Solution;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class SolutionViewModel extends ViewModel
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
        $this->StaticTable = is_null($StaticTable) ? new Solution(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.solution.create',Request()->query());
        $this->routeView = route('admin.solution.index',Request()->query());
        $this->viewTable = 'Solution';
        $this->allPage = Page::where('slug',Request()->category)->first()->childe;
        $this->allTabs = Tabs::get();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.solution.store')
            : route('admin.solution.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
