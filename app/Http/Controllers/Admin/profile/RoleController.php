<?php
namespace App\Http\Controllers\Admin\profile;
use App\Actions\Role\StoreRoleAction;
use App\Actions\Role\UpdateRoleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\StoreRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\ViewModels\Roles\RolesViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class RoleController extends Controller
{
public function index(Request $request):View
{
    $roles = Role::Search();
    return view('admin.roles.index',compact('roles'))->with('i', ($request->input('page', 1) - 1) * 5);
}


public function create():View
{
    return view('admin.roles.create',new RolesViewModel());
}

public function store(StoreRoleRequest $request):RedirectResponse
{
    app(StoreRoleAction::class)->handle($request->validated());
    return redirect()->route('admin.roles.index')->with('add','Role created successfully');
}

public function show(Role $role):View
{
    $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")->where("role_has_permissions.role_id",$role->id)->get();
    return view('admin.roles.show',compact('role','rolePermissions'));
}

public function edit(Role $role):View
{
    $permission = Permission::get();
    $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
    ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
    return view('admin.roles.edit',compact('role','permission','rolePermissions'));
}

    public function update(UpdateRoleRequest $request, Role $role):RedirectResponse
    {
        app(UpdateRoleAction::class)->handle($role,$request->validated());
        return redirect()->route('admin.roles.index')->with('edit','Role updated successfully');
    }

    public function destroy(Role $role):RedirectResponse
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('delete','Role deleted successfully');
    }
}
