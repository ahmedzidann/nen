<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Actions\ContactUs\Services\StoreContactUsServiceAction;
use App\Actions\ContactUs\Services\UpdateContactUsServiceAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactUs\ContactUsServiceRequest;
use App\Models\ContactUsService;
use App\ViewModels\ContactUs\ServiceModelView;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index()
    {

        return view('admin.contact_us.services.view', new ServiceModelView());
    }
    public function show(Request $request, $language)
    {

        if ($request->ajax()) {

            $data = ContactUsService::query();
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.contact-us-services.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create(Request $request): View
    {
        return view('admin.contact_us.services.create', new ServiceModelView());
    }
    public function store(ContactUsServiceRequest $request)
    {
        app(StoreContactUsServiceAction::class)->handle($request->validated());
        redirect()->route('admin.contact-us-services.index')->with('add', 'Success Add Contact');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Contact',
            'redirect_url' => route('admin.contact-us-services.index'),
        ]);
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = ContactUsService::find($id);
        return view('admin.contact_us.services.edit', new ServiceModelView($StaticTable));
    }
    public function update(ContactUsServiceRequest $request, $id)
    {
        $StaticTable = ContactUsService::find($id);
        app(UpdateContactUsServiceAction::class)->handle($StaticTable, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update Contact',
            'redirect_url' => route('admin.contact-us-services.index', ['category=' . $request->category, 'subcategory=' . $request->subcategory]),
        ]);
    }
    public function destroy(Request $request)
    {
        ContactUsService::whereIn('id', $request->ids)->delete();
        return redirect()->back()->with('delete', 'Delete Contact');
    }
}
