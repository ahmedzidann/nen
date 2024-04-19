<?php
namespace App\ViewModels\AboutView;

use App\Models\Page;
use App\Models\StaticTable;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class CertificatesTableViewModel extends ViewModel
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
    public  $childe_pages_id;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable = is_null($StaticTable) ? new StaticTable(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.about.certificates.create',Request()->query());
        $this->routeView = route('admin.about.certificates.index',Request()->query());
        $this->viewTable = 'Certificates';
        $this->allPage = Page::get();
        if(!empty(Request()->category) && !empty(Request()->subcategory) && !empty(Request()->subsubcategory)){
            $this->SelectPages = Page::where('slug',Request()->subcategory)->first();
            $this->childe_pages_id = Page::where('slug',Request()->subsubcategory)->first();
            $this->DataFull = StaticTable::where('item',Request()->item)
            ->where('pages_id',$this->SelectPages->id)->where('childe_pages_id',$this->childe_pages_id->id)->first();

        }
        elseif(!empty(Request()->category) && !empty(Request()->subcategory)){
            $this->SelectPages = Page::where('slug',Request()->subcategory)->first();
            $this->childe_pages_id = Page::where('slug',Request()->subsubcategory)->first();
            $this->DataFull = StaticTable::where('item',Request()->item)->where('pages_id',$this->SelectPages->id)->first();
            // dd($this->DataFull);
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
            ? route('admin.about.certificates.store')
            : route('admin.about.certificates.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
