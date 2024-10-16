<?php
namespace App\ViewModels\FindUs;
use App\Models\Page;
use App\Models\Admin;
use App\Models\Level;
use App\Models\Country;
use App\Models\Category;
use App\Models\TranslationKey;
use Spatie\ViewModels\ViewModel;
use Spatie\Permission\Models\Role;

class LevelViewModel extends ViewModel
{
    public  $admin;
    public  $type;
    public  $cats;
    public  $AdminRole;
    public  $translation;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;

    public function __construct($admin = null)
    {
        $this->admin = is_null($admin) ? new Level(old()) : $admin;
        $this->type = is_null($admin)?'Create':'Edit' ;
        $this->cats = Page::whereNull('parent_id')->get();
        $this->translation = TranslationKey::get();
        // $this->AdminRole = is_null($admin) ? new Country(old()) : $admin->roles->pluck('name','name')->first();
        $this->routeCreate = route('admin.levels.create');
        $this->routeView = route('admin.levels.index');
        $this->viewTable = 'levels';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.levels.store')
            : route('admin.levels.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}
