<?php
namespace App\Http\Controllers\Admin\Projects;
use App\Actions\Project\StoreProjectAction;
use App\Actions\Project\UpdateProjectAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\ProjectRequest;
use App\Models\Page;
use App\Models\Project;
use App\Models\Tabs;
use App\ViewModels\ProjectView\ProjectTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index():View
    {
        return view('admin.project.view',new ProjectTableViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Project::select('*')->latest();
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    $category = $request->category;
                    $subcategory = $request->subcategory;
                return Datatables::of($data) 
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {
                        return 
                        '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';
                        })
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  { 
                                return $row->translate('title', $language);
                        })
                        ->editColumn('Page', function ($row) use($language)  { 
                                if(!empty($row->Page)){
                                return $row->Page->translate('name', $language);
                                }
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        
                        ->addColumn('action', function($row) use ($category,$subcategory) {
                            $Tabs = Tabs::get();
                            $options = '';
                            foreach($Tabs as $item){
                                if($item->slug=='about'){
                                 $options .= '<li><a width="100%"  href="'.route('admin.tabproject.about.index',['tab='.$item->slug,'project_id='.$row->id]).'">'.$item->name.'</a></li>';
                                }elseif($item->slug=='program'){
                                 $options .= '<li><a href="'.route('admin.tabproject.program.index',['tab='.$item->slug,'project_id='.$row->id]).'">'.$item->name.'</a></li>';
                                }elseif($item->slug=='help'){
                                 $options .= '<li><a href="'.route('admin.tabproject.help.index',['tab='.$item->slug,'project_id='.$row->id]).'">'.$item->name.'</a></li>';
                                }elseif($item->slug=='join-us'){
                                 $options .= '<li><a href="'.route('admin.tabproject.joinus.index',['tab='.$item->slug,'project_id='.$row->id]).'">'.$item->name.'</a></li>';
                                }elseif($item->slug=='archive'){
                                $options .= '<li><a href="'.route('admin.tabproject.archive.index',['tab='.$item->slug,'project_id='.$row->id]).'">'.$item->name.'</a></li>';
                               }else{
                                 $options .= '<li><a href="'.url('admin.tabproject.joinus.index',['tab='.$item->slug,'project_id='.$row->id]).'">'.$item->name.'</a></li>';
                                }
                            };
                            
                        return
                        '
                        <div class="order-actions">
                        <a href="'.route('admin.project.edit',[$row->id,'category='.$category,'subcategory='.$subcategory]).'" class="m-auto"><i class="bx bxs-edit"></i></a>
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
                        })
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }
                
    }
    public function create(Request $request):View
    {
        return view('admin.project.create',new ProjectTableViewModel());
    }
    public function store(ProjectRequest $request)
    {
        $validator = $request->validationStore();
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(StoreProjectAction::class)->handle($validator->validated());
            redirect()->route('admin.project.index')->with('add','Success Add Project');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Project',
                'redirect_url' => route('admin.project.index',['category='.$request->category]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =Project::find($id); 
        return view('admin.project.edit',new ProjectTableViewModel($StaticTable));
    }
    public function update(ProjectRequest $request, $id)
    {    
        $StaticTable =Project::find($id); 
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
            app(UpdateProjectAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update Project',
                'redirect_url' => route('admin.project.index'),
            ]);
        }
        
    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Project::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete Project');
    }
}