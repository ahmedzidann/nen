<?php
namespace App\ViewModels\AdminsView;
use App\Models\Admin;
use App\Models\TranslationKey;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class AdminViewModel extends ViewModel
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
        $this->admin = is_null($admin) ? new Admin(old()) : $admin;
        $this->type = is_null($admin)?'Create':'Edit' ;
        $this->roles = Role::pluck('name','name')->all();
        $this->translation = TranslationKey::get();
        $this->AdminRole = is_null($admin) ? new Admin(old()) : $admin->roles->pluck('name','name')->first();
        $this->routeCreate = route('admin.admins.create');
        $this->routeView = route('admin.admins.index');
        $this->viewTable = 'Admins';
    }

    public function action(): string
    {
        return is_null($this->admin->id)
            ? route('admin.admins.store')
            : route('admin.admins.update', $this->admin->id);
    }

    public function method(): string
    {
        return is_null($this->admin->id) ? 'POST' : 'PUT';
    }
}
