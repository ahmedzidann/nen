<?php
namespace App\Actions\Role;
use App\Models\Role;
class UpdateRoleAction
{
    public function handle($role,array $data): Role
    {
        $role->name = $data['name'];
        $role->save();
        $role->syncPermissions($data['permission']);
        return $role;
    }
}
