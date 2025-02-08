<?php
namespace App\Http\Controllers\Admin\Summary;

use App\Actions\Summary\StoreSummaryAction;
use App\Actions\Summary\UpdateSummaryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testing\TestingRequest;
use App\Models\Summary;
use App\Models\SummaryReference;
use App\ViewModels\SummaryView\SummaryViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SummaryController extends Controller
{
    public function index(): View
    {

        return view('admin.summary.view', new SummaryViewModel());
    }
    public function show(Request $request, $language)
    {
        if ($request->ajax()) {
            $data = Summary::query()->select('*')->with('page')->latest();
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            $category = $request->category;
            $subcategory = $request->subcategory;
            $item = $request->item ?? "";
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->addColumn('page', function ($row) use ($language) {
                    return $row->page->translate('name', $language);
                })
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})

                ->addColumn('action', function ($row) use ($category, $subcategory, $item) {return '<div class="d-flex order-actions"> <a href="' . route('admin.summary.edit', ['summary' => $row->id]) . '" class="m-auto"><i class="bx bxs-edit"></i></a></div> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        return view('admin.summary.create', new SummaryViewModel());
    }
    public function store(TestingRequest $request)
    {

        $validator = $request->validationStore();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            app(StoreSummaryAction::class)->handle($validator->validated());
            redirect()->route('admin.summary.index')->with('add', 'Success Add Summary');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Summary',
                'redirect_url' => route('admin.summary.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {
        $summary = Summary::find($id);
        // return response()->download(url('storage/Testing/17093629611_ProjectsController.php'));
        return view('admin.summary.edit', new SummaryViewModel($summary));
    }
    public function update(TestingRequest $request, $id)
    {
        $summary = Summary::find($id);
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
            app(UpdateSummaryAction::class)->handle($summary, $validator->validated());
            return response()->json([
                'status' => 200,
                'message' => 'Update Summary',
                'redirect_url' => route('admin.summary.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
            ]);
        }

    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (Summary::find($request->id) as $summary) {$summary->delete();}
        return redirect()->back()->with('delete', 'Delete Summary');
    }
        public function deleteLink($link_id)
    {
        $link = SummaryReference::find($link_id);

        if ($link) {
            // Delete the record
            $link->delete();
            return response()->json(['message' => 'Link deleted successfully!']);
        } else {
            // Return an error response if the record does not exist
            return response()->json(['message' => 'Link not found.'], 404);
        }
    }
}
