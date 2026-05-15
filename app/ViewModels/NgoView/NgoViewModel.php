<?php
namespace App\ViewModels\NgoView;

use App\Models\Page;
use App\Models\Ngo;
use App\Models\TranslationKey;
use App\Models\TestingTechnologySection;
use Spatie\ViewModels\ViewModel;

class NgoViewModel extends ViewModel
{
    public $StaticTable;
    public $type;
    public $translation;
    public $translationFirst;
    public $routeCreate;
    public $viewTable;
    public $routeView;
    public $allPage;
    public $SelectPages;
    public $DataFull;
    public $sections;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable      = is_null($StaticTable) ? new Ngo(old()) : $StaticTable;
        $this->type             = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation      = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate      = route('admin.ngo.create', Request()->query());
        $this->routeView        = route('admin.ngo.index', Request()->query());
        $this->sections         = TestingTechnologySection::where('type', 'ngo')
                                    ->where('main_category_id', Request()->category)
                                    ->where('sub_category_id', Request()->subcategory)
                                    ->get();
        $this->viewTable = 'NGO';
        $this->allPage   = Page::get();

        if (!empty(Request()->category) && !empty(Request()->subcategory)) {
            $this->SelectPages = Page::where('slug', Request()->subcategory)->first();
            $this->DataFull    = Ngo::where('item', Request()->item)->where('pages_id', $this->SelectPages->id ?? '')->first();
        } elseif (!empty(Request()->category)) {
            $this->SelectPages = Page::where('slug', Request()->category)->first();
            $this->DataFull    = Ngo::where('item', Request()->item)->where('pages_id', $this->SelectPages->id ?? '')->first();
        } else {
            $this->SelectPages = '';
            $this->DataFull    = '';
        }
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.ngo.store')
            : route('admin.ngo.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
