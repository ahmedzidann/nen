<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Actions\ContactUs\StoreContactUsCountryAction;
use App\Actions\ContactUs\UpdateContactUsCountryAction;
use App\Enums\OfficeType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUs\ContactUsCountryRequest;
use App\Models\ContactUsCountry as ContactUsCountryModel;
use App\ViewModels\ContactUs\RegionalRepresentativeViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegionalRepresentativeController extends Controller
{
    public function index()
    {

        return view('admin.contact_us.regional_representative.view', new RegionalRepresentativeViewModel());
    }
    public function show(Request $request, $language)
    {

        if ($request->ajax()) {

            $data = ContactUsCountryModel::query()->where('type', OfficeType::REGIONAL_REPRESENTATIVES);
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
                ->editColumn('name', function ($row) use ($language) {
                    return $row->translate('name', $language);
                })
                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.regional-representatives.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        return view('admin.contact_us.regional_representative.create', new RegionalRepresentativeViewModel());
    }
    public function store(ContactUsCountryRequest $request)
    {
        app(StoreContactUsCountryAction::class)->handle($request->validated() + [
            'type' => OfficeType::REGIONAL_REPRESENTATIVES,
        ]);
        redirect()->route('admin.regional-representatives.index')->with('add', 'Success Add Contact');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Contact',
            'redirect_url' => route('admin.regional-representatives.index'),
        ]);
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = ContactUsCountryModel::find($id);
        return view('admin.contact_us.regional_representative.edit', new RegionalRepresentativeViewModel($StaticTable));
    }
    public function update(ContactUsCountryRequest $request, $id)
    {
        $StaticTable = ContactUsCountryModel::find($id);
        app(UpdateContactUsCountryAction::class)->handle($StaticTable, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update Contact',
            'redirect_url' => route('admin.regional-offices.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
        ]);
    }
    public function destroy(Request $request)
    {
        ContactUsCountryModel::whereIn('id', $request->ids)->delete();
        return redirect()->back()->with('delete', 'Delete Contact');
    }
}