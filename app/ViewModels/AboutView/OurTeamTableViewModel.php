<?php
namespace App\ViewModels\AboutView;

use App\Models\Management;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\StaticTable;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class OurTeamTableViewModel extends ViewModel
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
    public  $managements;

    public function __construct($StaticTable = null)
    {
        $request = Request();
        if ($request->category == 'about' && $request->subcategory == 'our-team' && $request->item == 'section-one'){
        $this->StaticTable = is_null($StaticTable) ? new StaticTable(old()) : $StaticTable;
        }else{
        $this->StaticTable = is_null($StaticTable) ? new OurTeam(old()) : $StaticTable;
        }
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.about.our-team.create',Request()->query());
        $this->routeView = route('admin.about.our-team.index',Request()->query());
        $this->viewTable = 'OurTeam';
        $this->allPage = Page::get();
        $this->managements = Management::get();
        if(!empty(Request()->category) && !empty(Request()->subcategory)){
            $this->SelectPages = Page::where('slug',Request()->subcategory)->first();
            $this->DataFull = OurTeam::where('item',Request()->item)->where('pages_id',$this->SelectPages->id??'')->first();
        }elseif(!empty(Request()->category)){
            $this->SelectPages = Page::where('slug',Request()->category)->first();
            $this->DataFull = OurTeam::where('item',Request()->item)->where('pages_id',$this->SelectPages->id??'')->first();
        }else{
            $this->SelectPages = '';
            $this->DataFull = '';
        }
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.about.our-team.store')
            : route('admin.about.our-team.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
