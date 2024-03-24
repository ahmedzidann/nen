<?php
namespace App\Actions\Role;

use App\Models\Role;

class StoreRoleAction
{
    public function handle(array $data): Role
    {
        $role = Role::create(['name' => $data['name']]);
        $role->syncPermissions($data['permission']);
        return $role;
    }
}
