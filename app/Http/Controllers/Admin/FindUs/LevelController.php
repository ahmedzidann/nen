<?php
namespace App\Http\Controllers\Admin\FindUs;
use App\Actions\Admins\StoreAdminAction;
use App\Actions\Admins\UpdateAdminAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Level;
use App\ViewModels\AdminsView\AdminViewModel;
use App\ViewModels\CountryView\CountryViewModel;
use App\ViewModels\FindUs\LevelViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index():View
    {
        return view('level.view',new LevelViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Level::select('*');
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
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.levels.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create():View
    {
        return view('level.crud',new LevelViewModel());
    }
    public function store(Request $request):RedirectResponse
    {
        $validateData = $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required|exists:pages,id',
        ]);
        // app(StoreAdminAction::class)->handle($request->validated());
        Level::create([
            "title" => $request->title,
            "category_id" => $request->category_id
        ]);
        return redirect()->route('admin.levels.index')->with('add','Success Add Admin');
    }
    public function edit(Level $level):View
    {
      //  dd();
        return view('level.crud',new LevelViewModel($level));
    }
    public function update(Request $request, Level $level):RedirectResponse
    {
        $validateData = $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required|exists:pages,id',
        ]);
        $level->update( $validateData);
        
       return redirect()->route('admin.levels.index')->with('edit','Update Level');
    }
    public function destroy(Request $request):RedirectResponse
    {
       
        foreach(Level::find($request->id) as $admin){$admin->delete();}
        return redirect()->back()->with('delete','Delete Level');
    }
}
