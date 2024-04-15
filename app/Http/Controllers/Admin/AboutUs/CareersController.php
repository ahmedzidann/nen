<?php
namespace App\Http\Controllers\Admin\AboutUs;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\AwardsRequest;
use App\Http\Requests\Admin\About\CareersRequest;
use App\Models\Page;
use App\Models\StaticTable;
use App\ViewModels\AboutView\AwardsTableViewModel;
use App\ViewModels\AboutView\CareersTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CareersController extends Controller
{
    public function index():View
    {
        return view('admin.about.careers.view',new CareersTableViewModel());
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

                        ->addColumn('action', function($row) use ($category,$subcategory,$item) {return'<div class="d-flex order-actions"> <a href="'.route('admin.about.careers.edit',[$row->id,'category='.$category,'subcategory='.$subcategory,'item='.$item]).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create(Request $request):View
    {
        if ($request->category == 'about' && $request->subcategory == 'careers' && $request->item == 'section-two'){
        return view('admin.about.careers.create_sectionTwo',new CareersTableViewModel());
        }else{
        return view('admin.about.careers.create',new CareersTableViewModel());
        }
    }
    public function store(CareersRequest $request)
    {
        if ($request->category == 'about' &&
            $request->subcategory == 'careers' &&
            $request->item == 'section-two'){
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
            redirect()->route('admin.about.careers.index')->with('add','Success Add Careers');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Careers',
                'redirect_url' => route('admin.about.careers.index',['category='.$request->category,'subcategory='.$request->subcategory,'item='.$request->item]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =StaticTable::find($id);
        if ($request->category == 'about' && $request->subcategory == 'careers' && $request->item == 'section-two'){
        return view('admin.about.careers.edit_sectionTwo',new CareersTableViewModel($StaticTable));
        }else{
        return view('admin.about.careers.edit',new CareersTableViewModel($StaticTable));
        }
    }
    public function update(CareersRequest $request, $id)
    {
        $StaticTable =StaticTable::find($id);
       if($request->submit2=='en'){
            if ($request->category == 'about' && $request->subcategory == 'careers' && $request->item == 'section-two'){
               $validator = $request->validationUpdateTwoEn();
            }else{
               $validator = $request->validationUpdateEn();
            }
       }else{
            if ($request->category == 'about' && $request->subcategory == 'careers' && $request->item == 'section-two'){
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
                'message'=>'Update Careers',
                'redirect_url' => route('admin.about.careers.index'),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(StaticTable::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete Careers');
    }
}
