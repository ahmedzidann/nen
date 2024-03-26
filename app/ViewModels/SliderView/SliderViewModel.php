<?php

namespace App\ViewModels\SliderView;

use App\Models\Page;
use App\Models\Slider;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class SliderViewModel extends ViewModel {

    public  $StaticTable;
    public  $type;
    public  $translation;
    public  $translationFirst;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;
    public  $allPage;

    public function __construct( $StaticTable = null ) {
        $this->StaticTable = is_null( $StaticTable ) ? new Slider( old() ) : $StaticTable;
        $this->type = is_null( $StaticTable )?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route( 'admin.slider.create', Request()->query() );
        $this->routeView = route( 'admin.slider.index', Request()->query() );
        $this->viewTable = 'Slider';
        $this->allPage = Page::WhereNull( 'parent_id' )->get();
    }

    public function action(): string {
        return is_null( $this->StaticTable->id )
        ? route( 'admin.slider.store' )
        : route( 'admin.slider.update', $this->StaticTable->id );
    }

    public function method(): string {
        return is_null( $this->StaticTable->id ) ? 'POST' : 'PUT';
    }
}
