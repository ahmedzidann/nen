<?php
namespace App\ViewModels\AboutView;

use App\Models\Page;
use App\Models\StaticTable;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class AwardsTableViewModel extends ViewModel
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

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new StaticTable(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.about.awards.create',Request()->query());
        $this->routeView = route('admin.about.awards.index',Request()->query());
        $this->viewTable = 'Awards';
        $this->allPage = Page::get();
        if(!empty(Request()->category) && !empty(Request()->subcategory)){
            $this->SelectPages = Page::where('slug',Request()->subcategory)->first();
            $this->DataFull = StaticTable::where('item',Request()->item)->where('pages_id',$this->SelectPages->id)->first();
        }elseif(!empty(Request()->category)){
            $this->SelectPages = Page::where('slug',Request()->category)->first();
            $this->DataFull = StaticTable::where('item',Request()->item)->where('pages_id',$this->SelectPages->id)->first();
        }else{
            $this->SelectPages = '';
            $this->DataFull = '';
        }
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.about.awards.store')
            : route('admin.about.awards.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
