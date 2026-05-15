<?php
namespace App\Http\Controllers\Admin\Ngo;

use App\Actions\Ngo\StoreNgoAction;
use App\Actions\Ngo\UpdateNgoAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ngo\NgoRequest;
use App\Models\Page;
use App\Models\Ngo;
use App\ViewModels\NgoView\NgoViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NgoItemController extends Controller
{
    public function index(): View
    {
        return view('admin.ngo.view', new NgoViewModel());
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
            $data = Ngo::where('item', $request->item)->where('pages_id', $page->id ?? '')->select('*')->latest();

            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            $category    = $request->category;
            $subcategory = $request->subcategory;
            $item        = $request->item;

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () { static $count = 0; $count++; return $count; })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($row) use ($category, $subcategory, $item) {
                    return '<div class="d-flex order-actions"><a href="' . route('admin.ngo.edit', [$row->id, 'category=' . $category, 'subcategory=' . $subcategory, 'item=' . $item]) . '" class="m-auto"><i class="bx bxs-edit"></i></a></div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
    }

    public function create(Request $request): View
    {
        if ($request->item == 'section-two') {
            return view('admin.ngo.create_sectionTwo', new NgoViewModel());
        } else {
            return view('admin.ngo.create', new NgoViewModel());
        }
    }

    public function store(NgoRequest $request)
    {
        if ($request->item == 'section-two') {
            $validator = $request->validationStoretwo();
        } else {
            $validator = $request->validationStore();
        }

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            app(StoreNgoAction::class)->handle($validator->validated());

            return response()->json([
                'status'       => 200,
                'message'      => 'Success Add NGO',
                'redirect_url' => route('admin.ngo.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory, 'item=' . $request->item]),
            ]);
        }
    }

    public function edit(Request $request, int $identity): View
    {
        $identity = Ngo::find($identity);

        if ($request->item == 'section-two') {
            return view('admin.ngo.edit_sectionTwo', new NgoViewModel($identity));
        } else {
            return view('admin.ngo.edit', new NgoViewModel($identity));
        }
    }

    public function update(NgoRequest $request, int $identity)
    {
        $identity = Ngo::find($identity);

        if ($request->submit2 == 'en') {
            if ($request->item == 'section-two') {
                $validator = $request->validationUpdateTwoEn();
            } else {
                $validator = $request->validationUpdateEn();
            }
        } else {
            if ($request->item == 'section-two') {
                $validator = $request->validationUpdateTwoAr();
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
            app(UpdateNgoAction::class)->handle($identity, $validator->validated());

            return response()->json([
                'status'       => 200,
                'message'      => 'Update NGO',
                'redirect_url' => route('admin.ngo.index'),
            ]);
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        foreach (Ngo::find($request->id) as $ngo) {
            $ngo->delete();
        }
        return redirect()->back()->with('delete', 'Delete NGO');
    }
}
