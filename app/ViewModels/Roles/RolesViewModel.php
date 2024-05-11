<?php
namespace App\ViewModels\Roles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class RolesViewModel extends ViewModel
{
    public  $role;
    public  $type;
    public  $permission;
    public  $routeCreate;
    public  $viewTable;
    public function __construct($role = null)
    {
        $this->permission = Permission::get();
        $this->type = is_null($role)?'Add':'Edit' ;
        $this->role = is_null($role) ? new Role(old()) : $role;
        $this->routeCreate = route('admin.roles.create');
        $this->viewTable = 'Role';
    }
    public function action(): string
    {
        return is_null($this->role->id)
            ? route('admin.roles.store')
            : route('admin.roles.update',$this->role->id);
    }

    public function method(): string
    {
        return is_null($this->role->id) ? 'POST' : 'PUT';
    }
}
