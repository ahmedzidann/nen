<?php
namespace App\Http\Controllers\Admin;

use App\Actions\Admins\StoreAdminAction;
use App\Actions\Admins\UpdateAdminAction;
use App\Actions\Pages\StorePagesAction;
use App\Actions\Pages\UpdatePagesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admins\StoreAdminRequest;
use App\Http\Requests\Admin\Admins\UpdateAdminRequest;
use App\Http\Requests\Admin\Pages\StorePagesRequest;
use App\Http\Requests\Admin\Pages\UpdatePagesRequest;
use App\Models\Page;
use App\ViewModels\AdminsView\AdminViewModel;
use App\ViewModels\PagesView\PagesViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PagesController extends Controller
{
    public function index()
    {
        return view('admin.pages.view',new PagesViewModel());
    }
    public function show(Request $request,$language)
    {


            if ($request->ajax()) {
                $data = Page::select('*')->latest();
              
                  
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                          
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    if(!empty($request->search_text)) {
                      
                        $data = $data->where(function($q) use ($request){
                            $q->whereJsonContains('name->en', $request->search_text)
                                ->orWhereJsonContains('name->ar', $request->search_text);
                        });
                    }
                    elseif(!empty($request->sub_parent_id)){
                        $data= $data->where('parent_id',$request->sub_parent_id);
                    }
                    elseif(!empty($request->parent_id)){
                        
                        $data= $data->where('parent_id',$request->parent_id);
                    }
                   
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('name', function ($row) use($language)  {
                                return $row->translate('name', $language);
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        ->addColumn('action', function($row){return'<div class="d-flex order-actions"> <a href="'.route('admin.pages.edit',$row->id).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create()
    {
        return view('admin.pages.create',new PagesViewModel());
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name.*' => ['required','max:255','min:2'],
            'description.*' => ['nullable','max:255','min:2'],
            'link' => ['nullable'],
            'sort' => ['nullable'],
            'navbar' => ['nullable'],
            'footer' => ['nullable'],
            'status' => ['nullable'],
            'parent_id' => ['nullable'],
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(StorePagesAction::class)->handle($validator->validated());
            redirect()->route('admin.pages.index')->with('add','Success Add Page');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Page',
                'redirect_url' => route('admin.pages.index'),
            ]);
        }
    }
    public function edit(Page $page):View
    {
        return view('admin.pages.edit',new PagesViewModel($page));
    }
    public function update(Request $request, Page $page)
    {
       if($request->submit2=='en'){
            $validator = Validator::make($request->all(), [
                'name.'.$request->submit2 => ['required','max:255','min:2'],
                'description.'.$request->submit2 => ['nullable','max:4000','min:2'],
                'link' => ['nullable'],
                'sort' => ['nullable'],
                'navbar' => ['nullable'],
                'footer' => ['nullable'],
                'status' => ['required'],
                'parent_id' => ['nullable'],
            ]);
       }else{
            $validator = Validator::make($request->all(), [
                'name.'.$request->submit2 => ['required','max:255','min:2'],
                'description.'.$request->submit2 => ['nullable','max:4000','min:2'],
            ]);
       }
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(UpdatePagesAction::class)->handle($page,$validator->validated());
            // redirect()->route('admin.pages.index')->with('add','Success Add Page');
            return response()->json([
                'status'=>200,
                'message'=>'Update Page',
                'redirect_url' => route('admin.pages.index'),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Page::find($request->id) as $admin){$admin->delete();}
        return redirect()->back()->with('delete','Delete Page');
    }
}
