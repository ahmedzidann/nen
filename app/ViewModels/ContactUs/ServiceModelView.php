<?php

namespace App\ViewModels\ContactUs;
use App\Models\TranslationKey;
use App\Models\ContactUsService;
use Spatie\ViewModels\ViewModel;

class ServiceModelView extends ViewModel
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
     public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new ContactUsService(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.contact-us-services.create',Request()->query());
        $this->routeView = route('admin.contact-us-services.index',Request()->query());
        $this->viewTable = 'Contact Us';
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.contact-us-services.store')
            : route('admin.contact-us-services.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
