<?php

namespace App\ViewModels\ContactUs;
use App\Models\Country;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;
use App\Models\ContactUsCountry as ContactUsCountryModel;

class RegionalRepresentativeViewModel extends ViewModel
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
        $this->StaticTable = is_null($StaticTable) ? new ContactUsCountryModel(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.regional-representatives.create',Request()->query());
        $this->routeView = route('admin.regional-representatives.index',Request()->query());
        $this->countries = Country::all();
        // $this->editRoute = route('admin.regional-offices.edit',['regional-offices'=> "5" ,''=>Request()->query()]);
        // dd($this->editRoute);
        $this->viewTable = 'Contact Us';
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.regional-representatives.store')
            : route('admin.regional-representatives.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
