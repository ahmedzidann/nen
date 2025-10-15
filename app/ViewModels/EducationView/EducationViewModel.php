<?php

namespace App\ViewModels\EducationView;

use App\Models\Education;
use App\Models\Page;
use App\Models\StaticTable;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;
use App\Models\Country;

class EducationViewModel extends ViewModel
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
    public  $countries;


    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new Education(old()) : $StaticTable;
        $this->type = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.education.create', Request()->query());
        $this->routeView = route('admin.education.index', Request()->query());
        // $this->editRoute = route('admin.education.edit',['education'=> "5" ,''=>Request()->query()]);
        // dd($this->editRoute);
        $this->viewTable = 'Education';
        $a = Page::where('slug', Request()->category)->first()->childe->where('slug', Request()->subcategory);
        // dd($a);
        $this->countries = Country::get();
        $this->allPage = $a->first()->childe;
        if (!empty(Request()->category) && !empty(Request()->subcategory) && !empty(Request()->item)) {
            $this->SelectPages = Page::where('slug', Request()->item)->first();
        } elseif (!empty(Request()->category) && !empty(Request()->subcategory)) {
            $this->SelectPages = Page::where('slug', Request()->subcategory)->first();
        } elseif (!empty(Request()->category)) {
            $this->SelectPages = Page::where('slug', Request()->category)->first();
        } else {
            $this->SelectPages = '';
        }
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.education.store')
            : route('admin.education.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
