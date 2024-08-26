<?php

namespace App\ViewModels\About;

use App\Models\About;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class AboutViewModel extends ViewModel
{
    public  $StaticTable;
    public  $type;
    public  $translation;
    public  $translationFirst;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;
    public  $allPage;
    public  $SelectPages;
    public  $DataFull;
    public  $editRoute;
    public  $modelCount;
     public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new About(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->modelCount = About::count();
        $this->routeCreate = route('admin.about.create',Request()->query());
        $this->routeView = route('admin.about.index',Request()->query());
        $this->viewTable = 'About';
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.about.store')
            : route('admin.about.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
