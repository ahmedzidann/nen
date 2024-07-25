<?php
namespace App\ViewModels\CountryView;
use App\Models\Admin;
use App\Models\Country;
use App\Models\TranslationKey;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class StateViewModel extends ViewModel
{
    public  $admin;
    public  $type;
    public  $countries;
    public  $AdminRole;
    public  $translation;
    public  $routeCreate;
    public  $viewTable;
    public  $routeView;

    public function __construct($admin = null)
    {
        $this->admin = is_null($admin) ? new Country(old()) : $admin;
        $this->type = is_null($admin)?'Create':'Edit' ;
        $this->countries = Country::all();
        $this->translation = TranslationKey::get();
        // $this->AdminRole = is_null($admin) ? new Country(old()) : $admin->roles->pluck('name','name')->first();
        $this->routeCreate = route('admin.states.create');
        $this->routeView = route('admin.states.index');
        $this->viewTable = 'states';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.states.store')
            : route('admin.states.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}
