<?php
namespace App\Http\Controllers\Admin\AboutUs;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\ClientsRequest;
use App\Http\Requests\Admin\About\PartnersRequest;
use App\Models\Page;
use App\Models\StaticTable;
use App\ViewModels\AboutView\ClientsTableViewModel;
use App\ViewModels\AboutView\PartnersTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    public function index():View
    {
        return view('admin.about.clients.view',new ClientsTableViewModel());
    }
    public function show(Request $request,$language)
    {
            if(!empty($request->category)  &&  !empty($request->subcategory)){
                $page = Page::where('slug',$request->subcategory)->first();
            }elseif(!empty($request->category)){
                $page = Page::where('slug',$request->category)->first();
            }else{
                $page = '';
            }
                $childe_pages_id = Page::where('slug',$request->subsubcategory)->first();
            if ($request->ajax()) {
                $data = StaticTable::where('pages_id',$page->id??'')->where('childe_pages_id',$childe_pages_id->id??'')->where('item',$request->item)->select('*')->latest();
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    $category = $request->category;
                    $subcategory = $request->subcategory;
                    $subsubcategory = $request->subsubcategory;
                    $item = $request->item;
                return Datatables::of($data) 
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  { 
                                return $row->translate('title', $language);
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        
                        ->addColumn('action', function($row) use ($category,$subcategory,$subsubcategory,$item) {return'<div class="d-flex order-actions"> <a href="'.route('admin.about.clients.edit',[$row->id,'category='.$category,'subcategory='.$subcategory,'subsubcategory='.$subsubcategory,'item='.$item]).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }
                
    }
    public function create(Request $request):View
    {
        if ($request->category == 'about' && $request->subcategory == 'clients' && $request->item == 'section-two'){
        return view('admin.about.clients.create_sectionTwo',new ClientsTableViewModel());
        }else{
        return view('admin.about.clients.create',new ClientsTableViewModel());
        }
    }
    public function store(ClientsRequest $request)
    {
        if ($request->category == 'about' && $request->subcategory == 'clients' && $request->item == 'section-two'){
            $validator = $request->validationStoreTwo();
        }else{
            $validator = $request->validationStore();
        }
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(StoreStaticTableAction::class)->handle($validator->validated());
            redirect()->route('admin.about.clients.index')->with('add','Success Add Clients');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Clients',
                'redirect_url' => route('admin.about.clients.index',['category='.$request->category,'subcategory='.$request->subcategory,'subsubcategory='.$request->subsubcategory,'item='.$request->item]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =StaticTable::find($id); 
        if ($request->category == 'about' && $request->subcategory == 'clients' && $request->item == 'section-two'){
        return view('admin.about.clients.edit_sectionTwo',new ClientsTableViewModel($StaticTable));
        }else{
        return view('admin.about.clients.edit',new ClientsTableViewModel($StaticTable));
        }
    }
    public function update(ClientsRequest $request, $id)
    {
        $StaticTable =StaticTable::find($id); 
       if($request->submit2=='en'){
            if ($request->category == 'about' && $request->subcategory == 'clients' && $request->item == 'section-two'){
               $validator = $request->validationUpdateTwoEn();
            }else{
               $validator = $request->validationUpdateEn();
            }
       }else{
            if ($request->category == 'about' && $request->subcategory == 'clients' && $request->item == 'section-two'){
                $validator = $request->validationUpdateTwoAr();
            }else{
                $validator = $request->validationUpdateAr();
            }
       }
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(UpdateStaticTableAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update Clients',
                'redirect_url' => route('admin.about.clients.index'),
            ]);
        }
        
    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(StaticTable::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete Clients');
    }
}
