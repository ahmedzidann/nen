<?php

namespace App\Http\Controllers\Admin\Projects\Tabs;

use App\Actions\ArchiveTabs\StoreArchiveTabsAction;
use App\Actions\ArchiveTabs\UpdateArchiveTabsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Project\Tabs\Archive\ArchiveRequest;
use App\Models\ProjectArchive;
use App\Models\Tabs;
use App\ViewModels\ProjectView\Tabs\ArchiveTabs\ArchiveTabsViewModel;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class ArchiveTabsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // dd( 'welcome' );
        return view('admin.project.tabs.archive.view', new ArchiveTabsViewModel());
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request): View
    {
        return view('admin.project.tabs.archive.create', new ArchiveTabsViewModel());
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(ArchiveRequest $request)
    {
           $validator = $request->validationStore();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $Tabs = Tabs::find($request->tabs_id);
            app(StoreArchiveTabsAction::class)->handle($validator->validated());
            redirect()->route('admin.tabproject.archive.index')->with('add', 'Success Add Archive');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Archive',
                'redirect_url' => route('admin.tabproject.archive.index', ['tab=' . $Tabs->slug, 'project_id=' . $request->project_id]),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */

   public function show(Request $request, $language)
    {

        if ($request->ajax()) {
            $Tabs = Tabs::where('slug', $request->category)->first();
            $data = ProjectArchive::select('*')->where('tabs_id', $Tabs->id)->where('project_id', $request->subcategory)->latest();
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
                ->editColumn('type', function ($row) use ($language) {
                    return $row->translate('type', $language);
                })
                ->editColumn('description', function ($row) use ($language) {
                    return $row->translate('description', $language);
                })
                ->editColumn('image', function ($row) use ($language) {
                    return $row->translate('image', $language);
                })
                ->editColumn('Project', function ($row) use ($language) {
                    if (!empty($row->Project)) {
                        return $row->Project->translate('title', $language);
                    }
                })
                ->editColumn('Tabs', function ($row) use ($language) {
                    if (!empty($row->Tabs)) {
                        return $row->Tabs->translate('name', $language);
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($row) use ($category, $subcategory) {
                    $route = route('admin.tabproject.archive.edit', [$row->id, 'tab=' . $category, 'project_id=' . $subcategory]);
                    return

                        '
                    <div class="order-actions">
                    <a href="' . $route . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                    ';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Request $request, $id)
    {
        $StaticTable = ProjectArchive::find($id);
        return view('admin.project.tabs.archive.edit', new ArchiveTabsViewModel($StaticTable));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ArchiveRequest $request, $id)
    {
        $StaticTable = ProjectArchive::find($id);
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
            app(UpdateArchiveTabsAction::class)->handle($StaticTable, $validator->validated());
            return response()->json([
                'status' => 200,
                'message' => 'Update archive',
                'redirect_url' => route('admin.tabproject.archive.index'),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request): RedirectResponse
    {
        foreach (ProjectArchive::find($request->id) as $static_table) {
            $static_table->delete();
        }
        return redirect()->back()->with('delete', 'Delete Archive');
    }
    
   public function download($id){
        $file = ProjectArchive::findorfail($id)->getFirstMediaUrl('firstFile');
        if (isset($file)){
        $path = isset(parse_url($file)['path']) ? parse_url($file)['path'] : '';
        $path = ltrim($path, '/');
            return response()->download(public_path($path));
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}