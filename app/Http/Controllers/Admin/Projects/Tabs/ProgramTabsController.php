<?php
namespace App\Http\Controllers\Admin\Projects\Tabs;
use App\Actions\AboutTabs\StoreAboutTabsAction;
use App\Actions\AboutTabs\UpdateAboutTabsAction;
use App\Actions\ProgramTabs\StoreProgramTabsAction;
use App\Actions\ProgramTabs\UpdateProgramTabsAction;
use App\Http\Requests\Admin\Project\Tabs\Program\ProgramRequest;
use App\Models\AboutTabs;
use App\Models\ProgramTabs;
use App\Models\Project;
use App\Models\Tabs;
use App\ViewModels\ProjectView\Tabs\AboutTabs\AboutTabsViewModel;
use App\ViewModels\ProjectView\Tabs\ProgramTabs\ProgramTabsViewModel;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ProgramTabsController
{
    public function index():View
    {
        return view('admin.project.tabs.program.view',new ProgramTabsViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $Tabs = Tabs::where('slug',$request->category)->first();
                $data = ProgramTabs::select('*')->where('tabs_id',$Tabs->id)->where('project_id',$request->subcategory)->latest();
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
                        ->editColumn('Project', function ($row) use($language)  { 
                                if(!empty($row->Project)){
                                return $row->Project->translate('title', $language);
                                }
                        })
                        ->editColumn('Tabs', function ($row) use($language)  { 
                                if(!empty($row->Tabs)){
                                return $row->Tabs->translate('name', $language);
                                }
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })
                        
                        ->addColumn('action', function($row) use ($category,$subcategory) {
                           $route = route('admin.tabproject.program.edit',[$row->id,'tab='.$category,'project_id='.$subcategory]);
                        return
                        
                        '
                        <div class="order-actions">
                        <a href="'.$route.'" class="m-auto"><i class="bx bxs-edit"></i></a>
                        ';
                        })
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }
                
    }
    
    public function create(Request $request):View
    {
       return view('admin.project.tabs.program.create',new ProgramTabsViewModel());
    }
    
    
    public function store(ProgramRequest $request)
    {
     
        $validator = $request->validationStore();
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            $Tabs = Tabs::find($request->tabs_id);
            app(StoreProgramTabsAction::class)->handle($validator->validated());
            redirect()->route('admin.tabproject.program.index')->with('add','Success Add Program');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Program',
                'redirect_url' => route('admin.tabproject.program.index',['tab='.$Tabs->slug,'project_id='.$request->project_id]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
     
        $StaticTable = ProgramTabs::find($id); 
       
       return view('admin.project.tabs.program.edit',new ProgramTabsViewModel($StaticTable));
    }
    
    public function update(ProgramRequest $request, $id)
    {    
        $StaticTable =ProgramTabs::find($id); 
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
            app(UpdateProgramTabsAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update Program',
                'redirect_url' => route('admin.tabproject.program.index'),
            ]);
        }
        
    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(ProgramTabs::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete ProgramTabs');
    }
    public function download($id){
        
        $file = ProgramTabs::findorfail($id);
        $dow = $file->getFirstMediaUrl('pdfFile')  ;
        $baseUrl = url('/');
        if (!empty($dow)) {
            return response()->download(str_replace($baseUrl."/", "", $dow));
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }

    }
}
