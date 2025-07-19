<?php
namespace App\ViewModels\Joinus;

use App\Models\Page;
 use App\Models\Joinus;
use App\Models\Project;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class JoinusViewModel extends ViewModel
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
    public  $main_titles ;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new Project(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.joinus.create',Request()->query());
        $this->routeView = route('admin.joinus.index',Request()->query());
        $this->viewTable = 'Joinus';
        $this->allPage = Page::where('id',Request()->pages_id)->first()?->childe ??[];
       $this->main_titles = Joinus::where('parent_id',Request()->parent_id)->where('type','main')->get();

        // $this->allTabs = Tabs::get();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.joinus.store')
            : route('admin.joinus.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
