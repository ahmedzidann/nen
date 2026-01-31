<?php

namespace App\Http\Controllers\Admin\Testing;

use App\Actions\Testing\StoreTestingAction;
use App\Actions\Testing\UpdateTestingAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Testing\TestingRequest;
use App\Models\Page;
use App\Models\Testing;
use App\ViewModels\TestingView\TestingViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestingController extends Controller
{
    public function index(): View
    {

        return view('admin.testing.view', new TestingViewModel());
    }
    public function show(Request $request, $language)
    {
        // if(!empty($request->category)  &&  !empty($request->subcategory && !empty($request->item))){
        //     $page = Page::where('slug',$request->item)->first();
        // }

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

            $data = Testing::whereIn('pages_id', $pages ?? [])->select('*')->latest();
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            $category = $request->category;
            $subcategory = $request->subcategory;
            $item = $request->item ?? "";
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('Page2', function ($row) use ($language) {

                    if (!empty($row->Page)) {
                        return $row->Page->translate('name', $language);
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })

                ->addColumn('action', function ($row) use ($category, $subcategory, $item) {
                    return '<div class="d-flex order-actions"> <a href="' . route('admin.testing.edit', [$row->id, 'category=' . $category, 'subcategory=' . $subcategory]) . '" class="m-auto"><i class="bx bxs-edit"></i></a></div> ';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
    }
    public function create(Request $request): View
    {
        
        return view('admin.testing.create', new TestingViewModel());
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
            app(StoreTestingAction::class)->handle($validator->validated());
            redirect()->route('admin.testing.index')->with('add', 'Success Add Testing');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Testing',
                'redirect_url' => route('admin.testing.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = Testing::find($id);
        // return response()->download(url('storage/Testing/17093629611_ProjectsController.php'));
        return view('admin.testing.edit', new TestingViewModel($StaticTable));
    }
    public function update(TestingRequest $request, $id)
    {
        $StaticTable = Testing::find($id);
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
            app(UpdateTestingAction::class)->handle($StaticTable, $validator->validated());
            return response()->json([
                'status' => 200,
                'message' => 'Update Testing',
                'redirect_url' => route('admin.testing.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
            ]);
        }
    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (Testing::find($request->id) as $static_table) {
            $static_table->delete();
        }
        return redirect()->back()->with('delete', 'Delete Testing');
    }
}
