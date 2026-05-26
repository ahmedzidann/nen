<?php

namespace App\ViewModels\HomeVideoView;

use App\Models\HomeVideo;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class HomeVideoViewModel extends ViewModel
{
    public $StaticTable;
    public $type;
    public $translation;
    public $translationFirst;
    public $routeCreate;
    public $routeView;
    public $viewTable;

    public function __construct($StaticTable = null)
    {
        $this->StaticTable    = is_null($StaticTable) ? new HomeVideo(old()) : $StaticTable;
        $this->type           = is_null($StaticTable) ? 'Create' : 'Edit';
        $this->translation    = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate    = route('admin.homepage.video.create');
        $this->routeView      = route('admin.homepage.video.index');
        $this->viewTable      = 'Homepage Video';
    }

    public function action(): string
    {
        return is_null($this->StaticTable->id)
            ? route('admin.homepage.video.store')
            : route('admin.homepage.video.update', $this->StaticTable->id);
    }

    public function method(): string
    {
        return is_null($this->StaticTable->id) ? 'POST' : 'PUT';
    }
}
