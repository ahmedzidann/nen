<?php

namespace App\ViewModels\Management;

use App\Models\Management;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;

class ManagementViewModel extends ViewModel
{
    public  $management;
    public  $type;
    public  $translation;
    public  $translationFirst;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;

    public function __construct($management = null)
    {
        $this->management = is_null($management) ? new Management(old()) : $management;
        $this->type = is_null($management)?'Create':'Edit' ;
        $this->translation = TranslationKey::get();
        $this->translationFirst = TranslationKey::first();
        $this->routeCreate = route('admin.management.create');
        $this->routeView = route('admin.management.index');
        $this->viewTable = 'management';
    }

    public function action(): string
    {
        return is_null($this->management->id)
            ? route('admin.management.store')
            : route('admin.management.update', $this->management->id);
    }

    public function method(): string
    {
        return is_null($this->management->id) ? 'POST' : 'PUT';
    }
}
