<?php
namespace App\ViewModels\Roles;
use App\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class RolesViewModel extends ViewModel
{
    public  $role;
    public  $type;
    public  $permission;

    public function __construct($role = null)
    {
        $this->permission = Permission::get();
        $this->type = is_null($role)?'Add':'Edit' ;
        $this->role = is_null($role) ? new Role(old()) : $role;
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
