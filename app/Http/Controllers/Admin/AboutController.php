<?php

namespace App\Http\Controllers\Admin;

use App\Actions\About\StoreAboutAction;
use App\Actions\About\UpdateAboutAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\AboutRequest;
use App\Models\About;
use App\ViewModels\About\AboutViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.contact_us.about.view', new AboutViewModel());
    }
    public function show(Request $request, $language)
    {

        if ($request->ajax()) {

            $data = About::query();
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('text', function ($row) use ($language) {
                    return $row->translate('text', $language);
                })
                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.about.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        return view('admin.contact_us.about.create', new AboutViewModel());
    }
    public function store(AboutRequest $request)
    {
        $data = $request->validated();
        app(StoreAboutAction::class)->handle($data);
        redirect()->route('admin.about.index')->with('add', 'Success Add About');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add About',
            'redirect_url' => route('admin.about.index'),
        ]);
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = About::find($id);
        return view('admin.contact_us.about.edit', new AboutViewModel($StaticTable));
    }
    public function update(AboutRequest $request, $id)
    {
        $StaticTable = About::find($id);
        app(UpdateAboutAction::class)->handle($StaticTable, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update Contact',
            'redirect_url' => route('admin.about.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
        ]);
    }
    public function destroy(Request $request)
    {
        About::whereIn('id', $request->ids)->delete();
        return redirect()->back()->with('delete', 'Delete About');
    }
}
