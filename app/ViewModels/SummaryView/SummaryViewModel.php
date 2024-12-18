<?php
namespace App\ViewModels\SummaryView;

use App\Models\Page;
use App\Models\Summary;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class SummaryViewModel extends ViewModel
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
    public $editRoute;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new Summary(old()) : $StaticTable;
        $this->type = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.summary.create', Request()->query());
        $this->routeView = route('admin.summary.index', Request()->query());

        $this->viewTable = 'Summary';
        $this->allPage = Page::whereNull('parent_id')->get();

        if (!empty(Request()->category) && !empty(Request()->subcategory) && !empty(Request()->item)) {
            $this->SelectPages = Page::where('slug', Request()->item)->first();
        } elseif (!empty(Request()->category) && !empty(Request()->subcategory)) {

            $this->SelectPages = Page::where('slug', Request()->subcategory)->first();
        } elseif (!empty(Request()->category)) {
            $this->SelectPages = Page::where('slug', Request()->category)->first();
        } else {
            $this->SelectPages = '';
        }

        // dd($this->SelectPages);
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
        ? route('admin.summary.store')
        : route('admin.summary.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
