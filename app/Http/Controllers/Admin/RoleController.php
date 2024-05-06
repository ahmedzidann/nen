<?php
namespace App\Http\Controllers\Admin;
use App\Actions\Role\StoreRoleAction;
use App\Actions\Role\UpdateRoleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\StoreRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use App\Models\Item;
use App\Models\Role as RoleNew;
use App\ViewModels\Roles\RolesViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;


class RoleController extends Controller
{
public function index(Request $request):View
{
    return view('admin.roles.view',new RolesViewModel());
}

    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Role::select('*');
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.roles.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }
                
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


public function edit(Role $role):View
{
    $permission = Permission::get();
    $permission = [];
    foreach ($role->permissions as $role_perm) {
        $permission[] = $role_perm->name;
    }
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
