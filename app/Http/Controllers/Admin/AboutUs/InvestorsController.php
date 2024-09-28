<?php
namespace App\Http\Controllers\Admin\AboutUs;

use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\InvestorsRequest;
use App\Http\Requests\Admin\About\ManypostRequest;
use App\Models\ManyTables;
use App\Models\Page;
use App\Models\StaticTable;
use App\ViewModels\AboutView\InvestorsTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvestorsController extends Controller
{
    use ImageHelper;
    public function index(): View
    {
        return view('admin.about.investors.view', new InvestorsTableViewModel());
    }

    public function many(Request $request, $id)
    {
        if (!empty($request->category) && !empty($request->subcategory)) {
            $page = Page::where('slug', $request->subcategory)->first();
        } elseif (!empty($request->category)) {
            $page = Page::where('slug', $request->category)->first();
        } else {
            $page = '';
        }
        if ($request->ajax()) {
            $data = ManyTables::where('static_tables_id', $id)->where('pages_id', $page->id ?? '')->where('item', $request->item)->select('*')->latest();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->addColumn('image', function ($row) {
                    return
                    '
                        <a href="' . asset($row->getFirstMediaUrl('country')) . '">
                            <img style="width: 30%;" src="' . asset($row->getFirstMediaUrl('country')) . '" alt="">
                        </a>
                        ';
                })
                ->addColumn('action', function ($row) {
                    return
                    '<div class="d-flex order-actions">
                        <a type="button" class="m-auto" data-bs-toggle="modal" data-id="' . $row->id . '" data-bs-target="#exampleModal2"><i class="fadeIn animated bx bx-trash"></i></a>
                        ';
                })

                ->rawColumns(['checkbox', 'image', 'action'])
                ->make(true);
        }

    }
    public function manydelete(Request $request, $id)
    {
        $ManyTables = ManyTables::find($request->id);
        $ManyTables->delete();
        return redirect()->back()->with('delete', 'Delete Item');
    }
    public function manypost(ManypostRequest $request, $id)
    {
        $StaticTable = StaticTable::find($id);
        $ManyTables = ManyTables::create([
            'pages_id' => $StaticTable->pages_id,
            'item' => $StaticTable->item,
            'static_tables_id' => $id,
            'since' => $request->since,
            'sharing' => $request->sharing,
            'sort' => $request->sort,
        ]);
        $this->StoreImage2($request->validated(), $ManyTables, 'country');

        return redirect()->back()->with('add', 'Create Item');
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
            $data = StaticTable::where('pages_id', $page->id ?? '')->where('item', $request->item)->select('*')->latest();
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

                ->addColumn('action', function ($row) use ($category, $subcategory, $item) {
                    return
                    '<div class="d-flex order-actions">
                        <a href="' . route('admin.about.investors.edit', [$row->id, 'category=' . $category, 'subcategory=' . $subcategory, 'item=' . $item]) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                        ';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        if ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-two') {
            return view('admin.about.investors.create_sectionTwo', new InvestorsTableViewModel());
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-three') {
            return view('admin.about.investors.create_sectionThree', new InvestorsTableViewModel());
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-foure') {
            return view('admin.about.investors.create_sectionFoure', new InvestorsTableViewModel());
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-five') {
            return view('admin.about.investors.create_sectionFoure', new InvestorsTableViewModel());
        } else {
            return view('admin.about.investors.create', new InvestorsTableViewModel());
        }
    }
    public function store(InvestorsRequest $request)
    {
        if ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-one') {
            $validator = $request->validationStoreOne();
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-two') {
            $validator = $request->validationStoreTwo();
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-three') {
            $validator = $request->validationStoreThree();
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-three') {
            $validator = $request->validationStoreThree();
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-foure') {
            $validator = $request->validationStoreFoure();
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-five') {
            $validator = $request->validationStoreFoure();
        } else {
            $validator = $request->validationStore();
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $staticTable = app(StoreStaticTableAction::class)->handle($validator->validated());
            if ($request->has('attributes')) {
                $staticTable->investorAttributes()->createMany(array_map(fn($item) => $item, $request['attributes']));
            }
            redirect()->route('admin.about.investors.index')->with('add', 'Success Add Investors');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Investors',
                'redirect_url' => route('admin.about.investors.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory, 'item=' . $request->item]),
            ]);
        }
    }
    public function edit(Request $request, $id): View
    {
        $investors = StaticTable::find($id);
        if ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-two') {
            return view('admin.about.investors.edit_sectionTwo', new InvestorsTableViewModel($investors));
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-three') {
            return view('admin.about.investors.edit_sectionThree', new InvestorsTableViewModel($investors));
        } elseif ($request->subcategory == 'investors' && $request->item == 'section-foure') {
            return view('admin.about.investors.edit_sectionFoure', new InvestorsTableViewModel($investors));
        } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-five') {
            return view('admin.about.investors.edit_sectionFoure', new InvestorsTableViewModel($investors->load('investorAttributes')));
        } else {
            return view('admin.about.investors.edit', new InvestorsTableViewModel($investors));
        }
    }
    public function update(InvestorsRequest $request, $id)
    {
        if ($request->submit2 == 'en') {
            if ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-one') {
                $validator = $request->validationUpdateOneEn();
            } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-two') {
                $validator = $request->validationUpdateTwoEn();
            } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-three') {
                $validator = $request->validationUpdateThreeEn();
            } elseif ( $request->subcategory == 'investors' && $request->item == 'section-foure') {
                $validator = $request->validationUpdateFoureEn();
            } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-five') {
                $validator = $request->validationUpdateFoureEn();
            } else {
                $validator = $request->validationUpdateEn();
            }
        } else {
            if ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-one') {
                $validator = $request->validationUpdateOneAr();
            } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-two') {
                $validator = $request->validationUpdateTwoAr();
            } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-three') {
                $validator = $request->validationUpdateThreeAr();
            } elseif ( $request->subcategory == 'investors' && $request->item == 'section-foure') {

                $validator = $request->validationUpdateFoureAr();
                $validator->validated()['category'] = $request->cat;
            } elseif ($request->category == 'about' && $request->subcategory == 'investors' && $request->item == 'section-five') {
                $validator = $request->validationUpdateFoureAr();
            } else {
                $validator = $request->validationUpdateAr();
            }
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $investors = StaticTable::find($id);
            app(UpdateStaticTableAction::class)->handle($investors, $validator->validated());
            if ($request->has('attributes')) {
                $investors->investorAttributes()->delete();
                $investors->investorAttributes()->createMany(array_map(fn($item) => $item, $request['attributes']));

            }

            return response()->json([
                'status' => 200,
                'message' => 'Update Investors',
                'redirect_url' => route('admin.about.investors.index'),
            ]);
        }

    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (StaticTable::find($request->id) as $static_table) {$static_table->delete();}
        return redirect()->back()->with('delete', 'Delete Investors');
    }
}
