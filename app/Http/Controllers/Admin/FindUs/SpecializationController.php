<?php
namespace App\Http\Controllers\Admin\FindUs;
use App\Actions\Admins\StoreAdminAction;
use App\Actions\Admins\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\Specialization;
use App\ViewModels\AdminsView\AdminViewModel;
use App\ViewModels\CountryView\CountryViewModel;
use App\ViewModels\FindUs\CertificateViewModel;
use App\ViewModels\FindUs\SpecializationViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SpecializationController extends Controller
{
    public function index():View
    {
        return view('specialization.view',new SpecializationViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Specialization::select('*');
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
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.specializations.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create():View
    {
        return view('specialization.crud',new SpecializationViewModel());
    }
    public function store(Request $request):RedirectResponse
    {
        // app(StoreAdminAction::class)->handle($request->validated());

        Specialization::create([
            "title" => $request->title,
            "category_id"=> $request->category_id
        ]);
        return redirect()->route('admin.specializations.index')->with('add','Success Add Admin');
    }
    public function edit(Specialization $Specialization):View
    {
       return view('specialization.crud',new SpecializationViewModel($Specialization));
    
    }
    public function update(Request $request, Specialization $Specialization):RedirectResponse
    {
        $validateData = $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required|exists:pages,id',
        ]);
        $Specialization->update($validateData);
        return redirect()->route('admin.specializations.index')->with('edit','Update Specialization');
    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Specialization::find($request->id) as $admin){$admin->delete();}
        return redirect()->back()->with('delete','Delete Specialization');
    }
}
