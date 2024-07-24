<?php
namespace App\ViewModels\FindUs;
use App\Models\Admin;
use App\Models\Country;
use App\Models\TranslationKey;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class CategoryViewModel extends ViewModel
{
    public  $admin;
    public  $type;
    public  $roles;
    public  $AdminRole;
    public  $translation;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;

    public function __construct($admin = null)
    {
        $this->admin = is_null($admin) ? new Country(old()) : $admin;
        $this->type = is_null($admin)?'Create':'Edit' ;
        // $this->roles = Role::pluck('name','name')->all();
        $this->translation = TranslationKey::get();
        // $this->AdminRole = is_null($admin) ? new Country(old()) : $admin->roles->pluck('name','name')->first();
        $this->routeCreate = route('admin.categories.create');
        $this->routeView = route('admin.categories.index');
        $this->viewTable = 'categories';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.categories.store')
            : route('admin.categories.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}
