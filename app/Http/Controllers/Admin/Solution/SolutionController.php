<?php
namespace App\Http\Controllers\Admin\Solution;
use App\Actions\Project\StoreProjectAction;
use App\Actions\Project\UpdateProjectAction;
use App\Actions\Solution\StoreSolutionAction;
use App\Actions\Solution\UpdateSolutionAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Solution\SolutionRequest;
use App\Models\Page;
use App\Models\Project;
use App\Models\Solution;
use App\Models\SolutionTab;
use App\Models\Tabs;
use App\ViewModels\SolutionView\SolutionViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SolutionController extends Controller
{
    public function index():View
    {
        return view('admin.solution.view',new SolutionViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Solution::select('*')->latest();
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    $category = $request->category;
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  {
                                return $row->translate('title', $language);
                        })
                        ->editColumn('Page', function ($row) use($language)  {
                                if(!empty($row->Page)){
                                return $row->Page->translate('name', $language);
                                }
                        })
                        ->editColumn('Tabs', function ($row) use($language)  {
                                if(!empty($row->Tabs)){
                                return $row->Tabs->translate('name', $language);
                                }
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })

                        ->addColumn('action', function($row) use ($category)
                        {
                            $Tabs = Tabs::where('type','solution')->get();
                            $options = '';
                            foreach($Tabs as $item){

                                $options .= '<li><a href="'.route('admin.tabsolution.index',['tab='.$item->slug,'solution_id='.$row->id]).'">'.$item->name.'</a></li>';

                            };

                        return
                        '
                        <div class="order-actions">
                         <a href="'.route('admin.solution.edit',[$row->id,'category='.$category]).'" class="m-auto"><i class="bx bxs-edit"></i></a>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Tabs
                            </button>
                            <ul class="dropdown-menu dragdown">
                                '.$options.'
                            </ul>
                        </div>
                        ';
                            return'<div class="d-flex order-actions"> <a href="'.route('admin.solution.edit',[$row->id,'category='.$category]).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';

                        })
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create(Request $request):View
    {
        return view('admin.solution.create',new SolutionViewModel());
    }
    public function store(SolutionRequest $request)
    {
            $validator = $request->validationStore();
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(StoreSolutionAction::class)->handle($validator->validated());
            redirect()->route('admin.solution.index')->with('add','Success Add Solution');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Solution',
                'redirect_url' => route('admin.solution.index',['category='.$request->category]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =Solution::find($id);
        return view('admin.solution.edit',new SolutionViewModel($StaticTable));
    }
    public function update(SolutionRequest $request, $id)
    {
        $StaticTable =Solution::find($id);
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
            app(UpdateSolutionAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update Solution',
                'redirect_url' => route('admin.solution.index'),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Solution::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete Solution');
    }
}
