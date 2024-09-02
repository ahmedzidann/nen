<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Actions\ContactUs\StoreContactUsCountryAction;
use App\Actions\ContactUs\UpdateContactUsCountryAction;
use App\Enums\OfficeType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUs\ContactUsCountryRequest;
use App\Models\ContactUsCountry as ContactUsCountryModel;
use App\ViewModels\ContactUs\AuthorizedOfficeViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AuthorizedOfficeController extends Controller
{
    public function index()
    {
        return view('admin.contact_us.authorize_office.view', new AuthorizedOfficeViewModel());
    }
    public function show(Request $request, $language)
    {

        if ($request->ajax()) {

            $data = ContactUsCountryModel::query()->with('country')->where('type', OfficeType::AUTHORIZED_OFFICES);
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('country', function ($row) use ($language) {
                    return $row->country->translate('title', $language);
                })
                ->addColumn('schedule', function ($row) {
                    $from = Carbon::parse($row->from_at)->format('l h:i A');
                    $to = Carbon::parse($row->to_at)->format('l h:i A');
                    return $from . '-' . $to;
                    ;
                })

                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.authorized-offices.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        return view('admin.contact_us.authorize_office.create', new AuthorizedOfficeViewModel());
    }
    public function store(ContactUsCountryRequest $request)
    {
        $data = $request->validated();
        $data['type'] = OfficeType::AUTHORIZED_OFFICES;
        app(StoreContactUsCountryAction::class)->handle($data);
        redirect()->route('admin.authorized-offices.index')->with('add', 'Success Add Contact');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Contact',
            'redirect_url' => route('admin.authorized-offices.index'),
        ]);
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = ContactUsCountryModel::with('country')->find($id);
        return view('admin.contact_us.authorize_office.edit', new AuthorizedOfficeViewModel($StaticTable));
    }
    public function update(ContactUsCountryRequest $request, $id)
    {
        $StaticTable = ContactUsCountryModel::find($id);
        app(UpdateContactUsCountryAction::class)->handle($StaticTable, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update Contact',
            'redirect_url' => route('admin.authorized-offices.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
        ]);
    }
    public function destroy(Request $request)
    {
        ContactUsCountryModel::whereIn('id', $request->ids)->delete();
        return redirect()->back()->with('delete', 'Delete Contact');
    }
}
