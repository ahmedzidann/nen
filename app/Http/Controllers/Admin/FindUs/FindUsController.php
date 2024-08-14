<?php
namespace App\Http\Controllers\Admin\FindUs;
use App\Actions\Admins\StoreAdminAction;
use App\Actions\Admins\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Country;
use App\Models\FindUs;
use App\ViewModels\AdminsView\AdminViewModel;
use App\ViewModels\CountryView\CountryViewModel;
use App\ViewModels\FindUs\FindUsViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FindUsController extends Controller
{
    public function index():View
    {
        return view('findus.view',new FindUsViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = FindUs::select('*');
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        // ->editColumn('title', function ($row) use($language)  {
                        //         return $row->translate('title', $language);
                        // })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.find-us.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create():View
    {
        return view('findus.crud',new FindUsViewModel());
    }
    public function store(Request $request):RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            // 'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'certificate_id' => 'required|exists:certificates,id',
            "specialization_id" =>"required",
            // Add other validation rules as needed
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'status' => 'required|string|in:pending,active,block',
            'join_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'user_comment' => 'nullable|string|max:255',
            'admin_comment' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // app(StoreAdminAction::class)->handle($request->validated());
        $data = $request->except(['image','links','links_title']);
        // dd($data);
        FindUs::create($data);
        return redirect()->route('admin.find-us.index')->with('add','Success Add Admin');
    }
    public function edit(int $admin):View
    {
        $admin = FindUs::find($admin);
        return view('findus.crud',new FindUsViewModel($admin));
    }
    public function update(Request $request, int $admin):RedirectResponse
    {
        $fus = (FindUs::find($admin));

        $request->validate([
            // 'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'certificate_id' => 'required|exists:certificates,id',
            "specialization_id" =>"required",
            // Add other validation rules as needed
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'status' => 'required|string|in:pending,active,block',
            'join_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'user_comment' => 'nullable|string|max:255',
            'admin_comment' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['image','links','links_title']);

        $fus->update($data);
        // app(UpdateAdminAction::class)->handle($admin,$request->validated());
        return redirect()->route('admin.countries.index')->with('edit','Update Admin');
    }
    public function destroy(Request $request):RedirectResponse
    {

        foreach(FindUs::find($request->id) as $admin){$admin->delete();}
        return redirect()->back()->with('delete','Delete Admin');
    }
}
