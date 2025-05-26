<?php

namespace App\ViewModels\Makeme;

use App\Models\Page;
use App\Models\Makeme;
use App\Models\Tabs;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class MakemeViewModel extends ViewModel
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

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new Makeme(old()) : $StaticTable;
        $this->type = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.makeme.create', request()->query());
        $this->routeView = route('admin.makeme.index', request()->query());
        $this->viewTable = 'Makeme';
        $this->allPage = Page::where('slug', 'makeme')->get();
        // $this->allTabs = Tabs::get();
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.makeme.store')
            : route('admin.makeme.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
