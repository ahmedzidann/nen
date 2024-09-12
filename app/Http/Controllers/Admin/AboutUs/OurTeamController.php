<?php
namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\OurTeam\StoreOurTeamTableAction;
use App\Actions\OurTeam\UpdateOurTeamTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\OurTeamRequest;
use App\Models\Management;
use App\Models\OurTeam;
use App\Models\Page;
use App\ViewModels\AboutView\OurTeamTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OurTeamController extends Controller
{
    public function index(): View
    {
        return view('admin.about.our-team.view', new OurTeamTableViewModel());
    }
    public function show(Request $request, $language)
    {
        if (!empty($request->category) && !empty($request->subcategory)) {
            $page = Page::where('slug', $request->subcategory)->first();
        } elseif (!empty($request->category)) {
            $page = Page::where('slug', $request->category)->first();
        } else {
            $page = '';
        }
        if ($request->ajax()) {
            $data = OurTeam::where('pages_id', $page->id ?? '')->where('item', $request->item)->select('*')->latest();
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            $category = $request->category;
            $subcategory = $request->subcategory;
            $item = $request->item;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})

                ->addColumn('action', function ($row) use ($category, $subcategory, $item) {return '<div class="d-flex order-actions"> <a href="' . route('admin.about.our-team.edit', [$row->id, 'category=' . $category, 'subcategory=' . $subcategory, 'item=' . $item]) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        if ($request->category == 'about' && $request->subcategory == 'our-team' && $request->item == 'section-one') {
            return view('admin.about.our-team.create', new OurTeamTableViewModel());
        } else {
            return view('admin.about.our-team.create_sectionTwo', new OurTeamTableViewModel());
        }
    }
    public function store(OurTeamRequest $request)
    {
        if ($request->category == 'about' && $request->subcategory == 'our-team' && $request->item == 'section-one') {
            $validator = $request->validationStore();
        } else {
            $validator = $request->validationStoreTwo();
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {

            app(StoreOurTeamTableAction::class)->handle($validator->validated());
            redirect()->route('admin.about.our-team.index')->with('add', 'Success Add OurTeam');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add OurTeam',
                'redirect_url' => route('admin.about.our-team.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory, 'item=' . $request->item]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {
        if ($request->category == 'about' && $request->subcategory == 'our-team' && $request->item == 'section-one') {
            $StaticTable = OurTeam::with('management')->find($id);
            return view('admin.about.our-team.edit', new OurTeamTableViewModel($StaticTable));
        } else {
            $StaticTable = OurTeam::with('management')->find($id);
            return view('admin.about.our-team.edit_sectionTwo', new OurTeamTableViewModel($StaticTable));
        }
    }
    public function update(OurTeamRequest $request, $id)
    {
        $StaticTable = OurTeam::find($id);
        if ($request->submit2 == 'en') {
            if ($request->category == 'about' && $request->subcategory == 'our-team' && $request->item == 'section-one') {
                $validator = $request->validationUpdateEn();
            } else {
                $validator = $request->validationUpdateTwoEn();
            }
        } else {
            if ($request->category == 'about' && $request->subcategory == 'our-team' && $request->item == 'section-one') {
                $validator = $request->validationUpdateAr();
            } else {
                $validator = $request->validationUpdateTwoAr();
            }
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            app(UpdateOurTeamTableAction::class)->handle($StaticTable, $validator->validated());
            return response()->json([
                'status' => 200,
                'message' => 'Update OurTeam',
                'redirect_url' => route('admin.about.our-team.index'),
            ]);
        }

    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (OurTeam::find($request->id) as $static_table) {$static_table->delete();}
        return redirect()->back()->with('delete', 'Delete OurTeam');
    }
}
