<?php
namespace App\Http\Controllers\Admin\Technology;

use App\Actions\Technology\StoreTechnologyAction;
use App\Actions\Technology\UpdateTechnologyAction;
use App\Actions\Testing\StoreTestingAction;
use App\Actions\Testing\UpdateTestingAction;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\Technology\TechnologyRequest;
use App\Models\Page;
use App\Models\Technology;
use App\ViewModels\TechnologyView\TechnologyViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Artisan;

class TechnologyController extends Controller
{
    public function index():View
    {

        return view('admin.technology.view',new TechnologyViewModel());
    }
    public function show(Request $request,$language)
    {
            // if(!empty($request->category)  &&  !empty($request->subcategory && !empty($request->item))){
            //     $page = Page::where('slug',$request->item)->first();
            // }
            if(!empty($request->category)  &&  !empty($request->subcategory)) {
                $pages = Page::whereHas('parent',function($q)use($request){
                    $q->where('slug',$request->subcategory);
                })->get()->pluck('id')->toArray();
            }elseif(!empty($request->category)){
                $pages = Page::where('slug',$request->category)->first();
            }else{
                $pages = '';
            }

            if ($request->ajax()) {

                $data = Technology::whereIn('pages_id',$pages??[])->select('*')->latest();
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    $category = $request->category;
                    $subcategory = $request->subcategory;
                    $item = $request->item ??"";
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  {
                                return $row->translate('title', $language);
                        })
                        ->editColumn('Page2', function ($row) use($language)  {

                                if(!empty($row->Page)){
                                return $row->Page->translate('name', $language);
                                }
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })

                        ->addColumn('action', function($row) use ($category,$subcategory,$item)
                        {return'<div class="d-flex order-actions"> <a href="'.route('admin.technology.edit',[$row->id,'category='.$category,'subcategory='.$subcategory]).'" class="m-auto"><i class="bx bxs-edit"></i></a></div> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create(Request $request):View
    {
        return view('admin.technology.create',new TechnologyViewModel());
    }
    public function store(TechnologyRequest $request)
    {

        dd($request);
        $validator = $request->validationStore();
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(StoreTechnologyAction::class)->handle($validator->validated());
            redirect()->route('admin.technology.index')->with('add','Success Add Technology');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Technology',
                'redirect_url' => route('admin.technology.index',['category='.$request->category,'subcategory='.$request->subcategory]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =Technology::find($id);
        // return response()->download(url('storage/Testing/17093629611_ProjectsController.php'));
        return view('admin.technology.edit',new TechnologyViewModel($StaticTable));
    }
    public function update(TechnologyRequest $request, $id)
    {

        $StaticTable =Technology::find($id);
       if($request->submit2=='en'){
               $validator = $request->validationUpdateEn();
       }else{
                $validator = $request->validationUpdateAr();
       }
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            // dd($validator->validated());
            app(UpdateTechnologyAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update technology',
                'redirect_url' => route('admin.technology.index',['category='.$request->category,'subcategory='.$request->subcategory]),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Technology::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete technology');
    }
}
