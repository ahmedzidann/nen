<?php
namespace App\ViewModels\DocValidationView;

use App\Models\DocValidation;
use App\Models\Page;
use App\Models\StaticTable;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class DocValidationViewModel extends ViewModel
{
    public  $StaticTable;
    public  $type;
    public  $translation;
    public  $translationFirst;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;
    public  $SelectPages;
    public  $DataFull;
    public $pages_id;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new DocValidation(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.doc-validation.create',Request()->query());
        $this->routeView = route('admin.doc-validation.index',Request()->query());
        $this->viewTable = 'DocValidation';

         $this->pages_id=Page::where('slug',Request()->subcategory)->first()->id??null;



        if(!empty(Request()->category) && !empty(Request()->subcategory) && !empty(Request()->item)){
            $this->SelectPages = Page::where('slug',Request()->item)->first();
        }
        elseif(!empty(Request()->category) && !empty(Request()->subcategory)){
            $this->SelectPages = Page::where('slug',Request()->subcategory)->first();
        }elseif(!empty(Request()->category)){
            $this->SelectPages = Page::where('slug',Request()->category)->first();
        }else{
            $this->SelectPages = '';
        }
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.doc-validation.store')
            : route('admin.doc-validation.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
