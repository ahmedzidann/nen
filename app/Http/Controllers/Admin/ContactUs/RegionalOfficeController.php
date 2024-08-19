<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Enums\OfficeType;
use App\Http\Controllers\Controller;
use App\Models\ContactUsCountry as ContactUsCountryModel;
use App\ViewModels\ContactUs\ContactUsCountry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\View\View;

class RegionalOfficeController extends Controller
{
    public function index()
    {

        return view('admin.contact_us.regional_office.view', new ContactUsCountry());
    }
    public function show(Request $request, $language)
    {

        if ($request->ajax()) {

            $data = ContactUsCountryModel::where('type', OfficeType::REGIONAL_OFFICES)->select('*');
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('country', function ($row) use ($language) {
                    return $row->translate('country', $language);
                })
                ->addColumn('schedule', function ($row) {return 'fdsdf';})
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})

                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.contact-us-country.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
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
