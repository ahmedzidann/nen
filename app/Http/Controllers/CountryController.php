<?php
namespace App\Http\Controllers;
use App\Actions\Admins\StoreAdminAction;
use App\Actions\Admins\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Country;
use App\ViewModels\AdminsView\AdminViewModel;
use App\ViewModels\CountryView\CountryViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Helper\ImageHelper;
class CountryController extends Controller
{
    use ImageHelper;
    public function index():View
    {
        return view('country.view',new CountryViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Country::select('*');
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  {
                                return $row->translate('title', $language);
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.countries.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create():View
    {
        return view('country.crud',new CountryViewModel());
    }
    public function store(Request $request):RedirectResponse
    {
        // app(StoreAdminAction::class)->handle($request->validated());

        $c = Country::create([
            "title" => $request->title
        ]);
        $this->StoreImage($request->all(),$c,'flag');
        return redirect()->route('admin.countries.index')->with('add','Success Add Admin');
    }
    public function edit(int $admin):View
    {
        $admin= Country::find($admin);
        return view('country.crud',new CountryViewModel($admin));
    }
    public function update(Request $request, int $admin):RedirectResponse
    {
        $admin= Country::find($admin);

        $admin->update([
            "title" => $request->title
        ]);
        $this->UpdateImage($request->all(),$admin,'flag');
        // app(UpdateAdminAction::class)->handle($admin,$request->validated());
        return redirect()->route('admin.countries.index')->with('edit','Update Admin');
    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Admin::find($request->id) as $admin){$admin->delete();}
        return redirect()->back()->with('delete','Delete Admin');
    }
}
