<?php
namespace App\Http\Controllers\Admin\profile;

use App\Http\Controllers\Controller;
use App\ViewModels\Roles\RolesViewModel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $rows = Role::query();
            return DataTables::of($rows)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="checkbox[]" class="form-check-input roles_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.roles.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->editColumn('created_at', function ($row) {
                    return date('Y/m/d', strtotime($row->created_at));
                })

                ->escapeColumns([])
                ->make(true);
        }

        return view('admin.roles.view', new RolesViewModel());
    }

    public function show()
    {

    }
    public function create()
    {
        return view('admin.roles.create', new RolesViewModel());
    }

    public function store(Request $request)
    {
        $validData = $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'nullable',
        ]);
        // dd($validData);
        $role = Role::create(['name' => $request->input('name'), 'guard_name' => 'admin']);

        $role->syncPermissions($request->input('permission'));

      return  redirect()->route('admin.roles.index')->with('success', 'Success Add Data Role');
    }

    public function edit(Role $role)
    {

        return view('admin.roles.edit', new RolesViewModel($role));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'nullable',
        ]);
        $role = Role::find($id);
        $old = $role;
        $role->name = $request->input('name');

        $role->save();
        $role->syncPermissions($request->input('permission'));

       return  redirect()->route('admin.roles.index')->with('success', 'Success Update Data Role');
    }

   public function bulkDelete(Request $request)
    {
         Role::whereIn('id', $request->id)->delete();

        return redirect()->back()->with('success', 'Delete Role');
    }
}
