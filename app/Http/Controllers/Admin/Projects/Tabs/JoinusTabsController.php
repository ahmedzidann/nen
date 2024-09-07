<?php
namespace App\Http\Controllers\Admin\Projects\Tabs;

use App\Actions\JoinusTabs\StoreJoinusTabsAction;
use App\Actions\JoinusTabs\UpdateJoinusTabsAction;
use App\Http\Requests\Admin\Project\Tabs\Joinus\JoinusRequest;
use App\Models\JoinusTabs;
use App\Models\Tabs;
use App\ViewModels\ProjectView\Tabs\JoinusTabs\JoinusTabsViewModel;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class JoinusTabsController
{
    public function index(): View
    {
        return view('admin.project.tabs.joinustabs.view', new JoinusTabsViewModel());
    }
    public function show(Request $request, $language)
    {
        if ($request->ajax()) {
            $Tabs = Tabs::where('slug', $request->category)->first();
            $data = JoinusTabs::select('*')->where('tabs_id', $Tabs->id)->where('project_id', $request->subcategory)->limit(1)->get();
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
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
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
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})

                ->addColumn('action', function ($row) use ($category, $subcategory) {
                    $route = route('admin.tabproject.joinus.edit', [$row->id, 'tab=' . $category, 'project_id=' . $subcategory]);
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

    public function create(Request $request): View
    {
        return view('admin.project.tabs.joinustabs.create', new JoinusTabsViewModel());
    }

    public function store(JoinusRequest $request)
    {
        $validator = $request->validationStore();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $Tabs = Tabs::find($request->tabs_id);
            app(StoreJoinusTabsAction::class)->handle($validator->validated());
            redirect()->route('admin.tabproject.joinus.index')->with('add', 'Success Add Program');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Program',
                'redirect_url' => route('admin.tabproject.joinus.index', ['tab=' . $Tabs->slug, 'project_id=' . request('project_id')]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {
        $joinUs = JoinusTabs::find($id);
        $StaticTable = JoinusTabs::where(['tabs_id' => $joinUs->tabs_id, 'project_id' => $joinUs->project_id])->get();
        return view('admin.project.tabs.joinustabs.edit', new JoinusTabsViewModel($StaticTable));
    }

    public function update(JoinusRequest $request, $id)
    {
        $StaticTable = JoinusTabs::find($id);
        if ($request->submit2 == 'en') {
            $validator = $request->validationUpdateEn();
        } else {
            $validator = $request->validationUpdateAr();
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            app(UpdateJoinusTabsAction::class)->handle($StaticTable, $validator->validated());
            return response()->json([
                'status' => 200,
                'message' => 'Update Program',
                'redirect_url' => route('admin.tabproject.joinus.index'),
            ]);
        }

    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (JoinusTabs::find($request->id) as $static_table) {$static_table->delete();}
        return redirect()->back()->with('delete', 'Delete ProgramTabs');
    }
    public function deleteJoin($join_id)
    {
        $join = JoinusTabs::find($join_id);

        if ($join) {
            // Delete the record
            $join->delete();
            return response()->json(['message' => 'join deleted successfully!']);
        } else {
            // Return an error response if the record does not exist
            return response()->json(['message' => 'join not found.'], 404);
        }
    }
}
