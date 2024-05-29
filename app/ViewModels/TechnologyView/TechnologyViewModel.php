<?php
namespace App\ViewModels\TechnologyView;

use App\Models\Page;
use App\Models\StaticTable;
use App\Models\Technology;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class TechnologyViewModel extends ViewModel
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
        $this->StaticTable = is_null($StaticTable) ? new Technology(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.technology.create',Request()->query());
        $this->routeView = route('admin.technology.index',Request()->query());
        // $this->editRoute = route('admin.technology.edit',['technology'=> "5" ,''=>Request()->query()]);
        // dd($this->editRoute);
        $this->viewTable = 'Technology';
        $a = Page::where('slug',Request()->category)->first()->childe->where('slug',Request()->subcategory);
        // dd($a);
        $this->allPage = $a->first()->childe;
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

        // dd($this->SelectPages);
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.technology.store')
            : route('admin.technology.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
