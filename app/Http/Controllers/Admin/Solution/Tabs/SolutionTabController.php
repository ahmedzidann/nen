<?php
namespace App\Http\Controllers\Admin\Solution\Tabs;
use App\Actions\AboutTabs\StoreAboutTabsAction;
use App\Actions\AboutTabs\UpdateAboutTabsAction;
use App\Actions\Solution\Tabs\StoreSolutionTabAction;
use App\Actions\Solution\Tabs\UpdateSolutionTabAction;
use App\Http\Requests\Admin\Project\Tabs\About\AboutRequest;
use App\Http\Requests\Admin\Solution\Tabs\SolutionTabRequest;
use App\Models\AboutTabs;
use App\Models\Project;
use App\Models\SolutionTab;
use App\Models\Tabs;
use App\ViewModels\ProjectView\Tabs\AboutTabs\AboutTabsViewModel;
use App\ViewModels\SolutionView\Tabs\SolutionTabsViewModel;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class SolutionTabController
{
    public function index():View
    {

        return view('admin.solution.tabs.view',new SolutionTabsViewModel());
    }
    public function show(Request $request,$language)
    {
        if ($request->ajax() || 1) {
            $Tabs = Tabs::where('slug',$request->category)->where('type','solution')->first();

                $data = SolutionTab::select('*')->where('tabs_id',$Tabs->id)
                ->where('solution_id',$request->subcategory)->latest();
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
                        ->editColumn('description', function ($row) use($language)  {
                            return $row->translate('description', $language);
                        })
                        // ->editColumn('Project', function ($row) use($language)  {
                        //         if(!empty($row->Project)){
                        //         return $row->Project->translate('title', $language);
                        //         }
                        // })
                        // ->editColumn('Tabs', function ($row) use($language)  {
                        //         if(!empty($row->Tabs)){
                        //         return $row->Tabs->translate('name', $language);
                        //         }
                        // })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })

                        ->addColumn('action', function($row) use ($category,$subcategory) {
                            $route = route('admin.tabsolution.edit',[$row->id,'tab='.$category,'project_id='.$subcategory]);

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
       return view('admin.solution.tabs.create',new SolutionTabsViewModel());
    }

    // public function createSectionTwo(Request $request):View
    // {
    //    return view('admin.project.tabs.createSectionTwo',new AboutTabsViewModel());
    // }

    public function store(SolutionTabRequest $request)
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
            app(StoreSolutionTabAction::class)->handle($validator->validated());
            redirect()->route('admin.tabsolution.index')->with('add','Success Add AboutTabs');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add AboutTabs',
                'redirect_url' => route('admin.tabsolution.index',['tab='.$Tabs->slug,'solution_id='.$request->solution_id]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =SolutionTab::find($id);
       return view('admin.solution.tabs.edit',new SolutionTabsViewModel($StaticTable));
    }

    // public function editSectionTwo(Request $request,$id):View
    // {
    //     $StaticTable =AboutTabs::find($id);
    //    return view('admin.project.tabs.editSectionTwo',new AboutTabsViewModel($StaticTable));
    // }
    public function update(SolutionTabRequest $request, $id)
    {
        $StaticTable =SolutionTab::find($id);

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
            app(UpdateSolutionTabAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update AboutTabs',
                'redirect_url' => route('admin.tabproject.about.index'),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(AboutTabs::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete tabproject');
    }
}
