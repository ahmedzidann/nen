<?php
namespace App\Http\Controllers\Admin\Projects\Tabs;

use Carbon\Carbon;
use App\Models\Tabs;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\ProjectAboutStatistic;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\StatisticsTabs\StoreStatisticsTabsAction;
use App\Actions\StatisticsTabs\UpdateStatisticsTabsAction;
use App\Http\Requests\Admin\Project\Tabs\Statistics\StatisticsRequest;
use App\ViewModels\ProjectView\Tabs\StatisticsTabs\StatisticsTabsViewModel;

class StatisticsTabsController
{
    public function index(): View
    {
        return view('admin.project.tabs.statistics.view', new StatisticsTabsViewModel());
    }
    public function show(Request $request, $language)
    {
        if ($request->ajax()) {
            $Tabs = Tabs::where('slug', $request->category)->first();
            $data = ProjectAboutStatistic::select('*')->where('tab_id', $Tabs->id)->where('project_id', $request->subcategory)->with(['project', 'tab'])->latest();
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
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('project_id', function ($row) use ($language) {
                    if (!empty($row->project)) {
                        return $row->project->translate('title', $language);
                    }
                })
                ->editColumn('tab_id', function ($row) use ($language) {
                    if (!empty($row->tab)) {
                        return $row->tab->translate('name', $language);
                    }
                })
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})

                ->addColumn('action', function ($row) use ($category, $subcategory) {
                    $route = route('admin.tabproject.statistics.edit', [$row->id, 'tab=' . $category, 'project_id=' . $subcategory]);
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
        return view('admin.project.tabs.statistics.create', new StatisticsTabsViewModel());
    }

    public function store(StatisticsRequest $request)
    {
        $validator = $request->validationStore();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $Tabs = Tabs::find($request->tab_id);
            app(StoreStatisticsTabsAction::class)->handle($validator->validated());
            redirect()->route('admin.tabproject.statistics.index')->with('add', 'Success Add statistics');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add statistics',
                'redirect_url' => route('admin.tabproject.statistics.index', ['tab=' . $Tabs->slug, 'project_id=' . $request->project_id]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {

        $StaticTable = ProjectAboutStatistic::find($id);

        return view('admin.project.tabs.statistics.edit', new StatisticsTabsViewModel($StaticTable));
    }

    public function update(StatisticsRequest $request, $id)
    {
        $StaticTable = ProjectAboutStatistic::find($id);
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
            app(UpdateStatisticsTabsAction::class)->handle($StaticTable, $validator->validated());
            return response()->json([
                'status' => 200,
                'message' => 'Update statistics',
                'redirect_url' => route('admin.tabproject.statistics.index'),
            ]);
        }

    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (ProjectAboutStatistic::find($request->id) as $static_table) {$static_table->delete();}
        return redirect()->back()->with('delete', 'Delete Statistics Tab');
    }
}
