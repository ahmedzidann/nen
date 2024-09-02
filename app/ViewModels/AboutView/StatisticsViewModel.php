<?php

namespace App\ViewModels\AboutView;

use App\Models\Page;
use App\Models\Statistic;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class StatisticsViewModel extends ViewModel
{
    public $StaticTable;
    public $type;
    public $translation;
    public $translationFirst;
    public $routeCreate;
    public $viewTable;
    public $routeView;
    public $allPage;
    public $SelectPages;
    public $DataFull;
    public $statistics;
    public $count;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new Statistic(old()) : $StaticTable;
        $this->count = Statistic::count();
        $this->type = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->statistics = Statistic::limit(3)->get();
        $this->routeCreate = route('admin.about.statistics.create', Request()->query());
        $this->routeView = route('admin.about.statistics.index', Request()->query());
        $this->viewTable = 'Statistic';
        $this->allPage = Page::get();

    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
        ? route('admin.about.statistics.store')
        : route('admin.about.statistics.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
