<?php
namespace App\ViewModels\FeatureAdvantagesView;

use App\Models\FeatureAdvantages;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class FeatureAdvantagesViewModel extends ViewModel
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
        $this->StaticTable = is_null($StaticTable) ? new FeatureAdvantages(old()) : $StaticTable;
        $this->type = is_null($StaticTable)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.feature-advantages.create',Request()->query());
        $this->routeView = route('admin.feature-advantages.index',Request()->query());
        $this->viewTable = 'FeatureAdvantages';
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.feature-advantages.store')
            : route('admin.feature-advantages.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
