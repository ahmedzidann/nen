<?php
namespace App\Http\Controllers\Admin\Education;

use App\Actions\Education\StoreEducationAction;
use App\Actions\Education\UpdateEducationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Education\EducationRequest;
use App\Models\Education;
use App\Models\Page;
use App\ViewModels\EducationView\EducationViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{
    public function index()
    {
        return view('admin.education.view', new EducationViewModel());
    }
    public function show(Request $request, $language)
    {
        if (!empty($request->category) && !empty($request->subcategory)) {
            $pages = Page::whereHas('parent', function ($q) use ($request) {
                $q->where('slug', $request->subcategory);
            })->get()->pluck('id')->toArray();
        } elseif (!empty($request->category)) {
            $pages = Page::where('slug', $request->category)->first();
        } else {
            $pages = '';
        }

        if ($request->ajax()) {

            $data = Education::whereIn('pages_id', $pages ?? [])->select('*')->latest();
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
                ->editColumn('Page2', function ($row) use ($language) {

                    if (!empty($row->Page)) {
                        return $row->Page->translate('name', $language);
                    }
                })
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})

                ->addColumn('action', function ($row) use ($category, $subcategory, $item) {return '<div class="d-flex order-actions"> <a href="' . route('admin.education.edit', [$row->id, 'category=' . $category, 'subcategory=' . $subcategory]) . '" class="m-auto"><i class="bx bxs-edit"></i></a></div> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        return view('admin.education.create', new EducationViewModel());
    }
    public function store(EducationRequest $request)
    {

        app(StoreEducationAction::class)->handle($request->validated());
        redirect()->route('admin.education.index')->with('add', 'Success Add Education');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Education',
            'redirect_url' => route('admin.education.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
        ]);
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = Education::find($id);
        return view('admin.education.edit', new EducationViewModel($StaticTable));
    }
    public function update(EducationRequest $request, $id)
    {
        // dd($request->validated()['links_title']);
        $StaticTable = Education::find($id);
        app(UpdateEducationAction::class)->handle($StaticTable, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update Education',
            'redirect_url' => route('admin.education.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
        ]);
    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (Education::find($request->id) as $static_table) {$static_table->delete();}
        return redirect()->back()->with('delete', 'Delete Education');
    }
}
