<?php
namespace App\ViewModels\TestingView;

use App\Models\Page;
use App\Models\StaticTable;
use App\Models\Testing;
use App\Models\TestingTechnologySection;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class TestingViewModel extends ViewModel
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
    public  $sections;

    public function __construct($StaticTable = null)
    {
       
        $this->StaticTable = is_null($StaticTable) ? new Testing(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.testing.create',Request()->query());
        $this->routeView = route('admin.testing.index',Request()->query());
        // $this->editRoute = route('admin.testing.edit',['testing'=> "5" ,''=>Request()->query()]);
        // dd($this->editRoute);

        $this->viewTable = 'Testing';
        $a = Page::where('slug',Request()->category)->first()->childe->where('slug',Request()->subcategory);
        $this->sections= TestingTechnologySection::where('main_category_id',Request()->category)->where('sub_category_id',Request()->subcategory)->get();
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
            ? route('admin.testing.store')
            : route('admin.testing.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
