<?php
namespace App\ViewModels\ProjectView\Tabs\StatisticsTabs;

use App\Models\ProjectAboutStatistic;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class StatisticsTabsViewModel extends ViewModel
{
    public $StaticTable;
    public $type;
    public $translation;
    public $translationFirst;
    public $routeCreate;
    public $viewTable;
    public $routeView;
    public $allPage;
    public $allTabs;
    public $tabs;

    public function __construct($StaticTable = null)
    {

        $this->StaticTable = is_null($StaticTable) ? new ProjectAboutStatistic(old()) : $StaticTable;
        $this->type = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.tabproject.statistics.create', Request()->query());
        $this->routeView = route('admin.tabproject.statistics.index', Request()->query());
        $this->viewTable = 'ProjectAboutStatistic';
        $this->allTabs = Tabs::get();
        $this->tabs = Tabs::where('slug', Request()->tab)->first();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
        ? route('admin.tabproject.statistics.store')
        : route('admin.tabproject.statistics.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }

}
