<?php
namespace App\Http\Controllers\Admin\Technology;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\IdentityRequest;
use App\Http\Requests\Admin\Technology\TechnologyRequest;
use App\Models\Page;
use App\Models\StaticTable;
use App\ViewModels\TechnologyView\TechnologyViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TechnologyResourceController extends Controller
{
    public function index():View
    {
        return view('admin.technology.view',new TechnologyViewModel());
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
            if ($request->ajax()) {
                $data = StaticTable::where('pages_id',$page->id??'')->where('item',$request->item)->select('*')->latest();
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    $category = $request->category;
                    $subcategory = $request->subcategory;
                    $item = $request->item;
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  {
                                return $row->translate('title', $language);
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })

                        ->addColumn('action', function($row) use ($category,$subcategory,$item) {return'<div class="d-flex order-actions"> <a href="'.route('admin.technology.edit',[$row->id,'category='.$category,'subcategory='.$subcategory,'item='.$item]).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create(Request $request):View
    {
        if ( $request->item == 'section-two'){
        return view('admin.technology.create_sectionTwo',new TechnologyViewModel());
        }else{
        return view('admin.technology.create',new TechnologyViewModel());
        }
    }
    public function store(TechnologyRequest $request)
    // public function store(Request $request)
    {
        if ($request->item == 'section-two'){
            $validator = $request->validationStoretwo();
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
            // if ($request->category == 'about' && $request->subcategory == 'identity' && $request->item == 'section-three'){
            //          foreach($request->description as $data){
            //              StaticTable::create([
            //              'pages_id'=>$request->pages_id,
            //              'category'=>$request->category,
            //              'subcategory'=>$request->subcategory,
            //              'item'=>$request->item,
            //              'sort'=>$request->sort,
            //              'description'=>$data['en'],
            //              ]);
            //          }
            // }else{

            // }
            redirect()->route('admin.technology.index')->with('add','Success Add Technology');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Technology',
                'redirect_url' => route('admin.technology.index',['category='.$request->category,'subcategory='.$request->subcategory,'item='.$request->item]),
            ]);
        }
    }
    public function edit(Request $request,int $identity):View
    {
        $identity = StaticTable::find($identity);
        if ($request->item == 'section-two'){

            return view('admin.technology.edit_sectionTwo',new TechnologyViewModel($identity));
        }else{
            return view('admin.technology.edit',new TechnologyViewModel($identity));
        }
    }
    public function update(TechnologyRequest $request, int $identity)
    {
        $identity = StaticTable::find($identity);
       if($request->submit2=='en'){
            if($request->item == 'section-two'){
              $validator = $request->validationUpdateTwoEn();
            }else{
              $validator = $request->validationUpdateEn();
            }
       }else{
            if($request->item == 'section-two'){
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
            app(UpdateStaticTableAction::class)->handle($identity,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update technology',
                'redirect_url' => route('admin.technology.index'),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(StaticTable::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete technology');
    }
}
