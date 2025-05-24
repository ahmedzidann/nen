<?php

namespace App\Http\Controllers\Admin\Joinus;

use App\Actions\Project\StoreProjectAction;
use App\Actions\Project\UpdateProjectAction;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Joinus\JoinusRequest;
use App\Http\Requests\Admin\Project\ProjectRequest;
use App\Models\Joinus;
use App\Models\Page;
use App\Models\Project;
use App\Models\Tabs;
use App\ViewModels\Joinus\JoinusViewModel;
use App\ViewModels\ProjectView\ProjectTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class JoinusController extends Controller
{

 use ImageHelper;

    public function index(): View
    {
        return view('admin.joinus.view', new JoinusViewModel());
    }
    public function show(Request $request, $language)
    {
        if ($request->ajax()) {
            $data = Joinus::select('*')->latest();
            if(!empty($request->parent_id)){
                $data->where('parent_id',$request->parent_id);
            }else{
                $data->where('parent_id',null );

            }
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            $category = $request->category;
            $subcategory = $request->subcategory;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return
                        '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('Page', function ($row) use ($language) {
                    if (!empty($row->Page)) {
                        return $row->Page->translate('name', $language);
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })

                ->addColumn('action', function ($row) use ($category, $subcategory, $request) {
                    $Tabs = Tabs::where('type', 'project')->get();
                    $options = '';
                    foreach ($Tabs as $item) {
                        if ($item->slug == 'about') {
                            $options .= '<li><a width="100%"  href="' . route('admin.tabproject.about.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        } elseif ($item->slug == 'program') {
                            $options .= '<li><a href="' . route('admin.tabproject.program.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        } elseif ($item->slug == 'help') {
                            $options .= '<li><a href="' . route('admin.tabproject.help.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        } elseif ($item->slug == 'join-us') {
                            $options .= '<li><a href="' . route('admin.tabproject.joinus.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        } elseif ($item->slug == 'archive') {
                            $options .= '<li><a href="' . route('admin.tabproject.archive.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        } elseif ($item->slug == 'statistics') {
                            $options .= '<li><a href="' . route('admin.tabproject.statistics.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        } else {
                            $options .= '<li><a href="' . route('admin.tabproject.joinus.index', ['tab=' . $item->slug, 'project_id=' . $row->id]) . '">' . $item->name . '</a></li>';
                        }
                    };
                  
                    $show = '
                        <a href="' . route('admin.joinus.index', [ 'parent_id=' . $row->id]) . '" class="m-auto">  <i class="bx bxs-show"></i></a>
            ';
            if(!empty($request->parent_id)){
               
              $show= '';
            }
                    return
                        '
                        <div class="order-actions">
                        <a href="' . route('admin.joinus.edit', [$row->id, 'category=' . $category, 'subcategory=' . $subcategory]) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                       
                        '.$show;
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
    }
    public function create(Request $request): View
    {
        return view('admin.joinus.create', new JoinusViewModel());
    }
    public function store(JoinusRequest $request)
    {
        $validator = $request->validationStore();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            // app(StoreProjectAction::class)->handle($validator->validated());
            $data = $validator->validated();
            $Project = Joinus::create($data);
            $this->StoreImage($data,$Project,'Joinus');
            redirect()->route('admin.joinus.index')->with('add', 'Success Add Project');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Project',
                'redirect_url' => route('admin.project.index', ['category=' . $request->category]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = Joinus::find($id);
        return view('admin.joinus.edit', new JoinusViewModel($StaticTable));
    }
    public function update(JoinusRequest $request, $id)
    {
        $StaticTable = Joinus::find($id);
        if ($request->submit2 == 'en') {
            $validator = $request->validationUpdateEn();
        } else {
            $validator = $request->validationUpdateAr();
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            // app(UpdateProjectAction::class)->handle($StaticTable, $validator->validated());
            $data =  $validator->validated();
             $StaticTable->update($data);
            $this->UpdateImage($data,$StaticTable,'Joinus');
            return response()->json([
                'status' => 200,
                'message' => 'Update Project',
                'redirect_url' => route('admin.project.index'),
            ]);
        }
    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (Joinus::find($request->id) as $static_table) {
            $static_table->delete();
        }
        return redirect()->back()->with('delete', 'Delete Joinus');
    }
}
