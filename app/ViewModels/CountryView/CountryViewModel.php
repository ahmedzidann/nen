<?php
namespace App\ViewModels\CountryView;
use App\Models\Admin;
use App\Models\Country;
use App\Models\TranslationKey;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class CountryViewModel extends ViewModel
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
        $this->routeCreate = route('admin.countries.create');
        $this->routeView = route('admin.countries.index');
        $this->viewTable = 'Countries';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.countries.store')
            : route('admin.countries.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}
