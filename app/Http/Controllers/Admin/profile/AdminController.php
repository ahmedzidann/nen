<?php
namespace App\Http\Controllers\Admin\profile;
use App\Actions\Admins\StoreAdminAction;
use App\Actions\Admins\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\ViewModels\AdminsView\AdminViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index():View
    {
        return view('admin.admins.view',new AdminViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Admin::select('*');
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('name', function ($row) use($language)  { 
                                return $row->translate('name', $language);
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.admins.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }
                
    }
    public function create():View
    {
        return view('admin.admins.crud',new AdminViewModel());
    }
    public function store(StoreAdminRequest $request):RedirectResponse
    {
        app(StoreAdminAction::class)->handle($request->validated());
        return redirect()->route('admin.admins.index')->with('add','Success Add Admin');
    }
    public function edit(Admin $admin):View
    {
        return view('admin.admins.crud',new AdminViewModel($admin));
    }
    public function update(UpdateAdminRequest $request, Admin $admin):RedirectResponse
    {
        app(UpdateAdminAction::class)->handle($admin,$request->validated());
        return redirect()->route('admin.admins.index')->with('edit','Update Admin');
    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Admin::find($request->id) as $admin){$admin->delete();}
        return redirect()->back()->with('delete','Delete Admin');
    }
}
