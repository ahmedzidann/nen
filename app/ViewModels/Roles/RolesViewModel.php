<?php
namespace App\ViewModels\Roles;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission as PermissionModel;
use Spatie\Permission\Models\Role;
use Spatie\ViewModels\ViewModel;

class RolesViewModel extends ViewModel
{
    public $role;
    public $type;
    public $permission;
    public $viewTable;
    public $routeCreate;
    public $rolePermissions;

    public function __construct($role = null)
    {
        $this->role = is_null($role) ? new Role(old()) : $role;
        $this->permission = PermissionModel::get()->groupBy('group');
        $this->viewTable = 'Role';
        $this->routeCreate = route('admin.roles.create');
        $this->type = is_null($role) ? 'Add' : 'Edit';
        if ($this->role) {
            $this->rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $this->role->id)
                ->pluck('permission_id')
                ->toArray();

        }
    }

    public function action(): string
    {
        return is_null($this->role->id)
        ? route('admin.roles.store')
        : route('admin.roles.update', $this->role->id);
    }

    public function method(): string
    {
        return is_null($this->role->id) ? 'POST' : 'PUT';
    }
}
