<?php
namespace App\ViewModels\ProjectView\Tabs\HelpTabs;
use App\Models\HelpTabs;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class HelpTabsViewModel extends ViewModel
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
        $this->StaticTable = is_null($StaticTable) ? new HelpTabs(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.tabproject.help.create',Request()->query());
        $this->routeView = route('admin.tabproject.help.index',Request()->query());
        $this->routeCreatesectionTwo = route('admin.tabproject.help_contactus',Request()->query());
        $this->viewTable = 'help';
        $this->allTabs = Tabs::get();
        $this->tabs = Tabs::where('slug',Request()->tab)->first();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.tabproject.help.store')
            : route('admin.tabproject.help.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
