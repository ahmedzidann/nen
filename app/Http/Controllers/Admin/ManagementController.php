<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\ViewModels\Management\ManagementViewModel;

class ManagementController extends Controller
{
    public function index()
    {
        return view('admin.management.view', new ManagementViewModel());
    }
    public function show(Request $request, $language)
    {

        if ($request->ajax()) {
            $data = Management::select('*')->latest();

            if ((!empty($request->from_date)) && (!empty($request->to_date))) {

                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            if (!empty($request->search_text)) {

                $data = $data->where(function ($q) use ($request) {
                    $q->whereJsonContains('title->en', $request->search_text)
                        ->orWhereJsonContains('title->ar', $request->search_text);
                });
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})
                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.management.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

    }
    public function create()
    {
        return view('admin.management.create', new ManagementViewModel());
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title.*' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            Management::create($validator->validated());
            redirect()->route('admin.management.index')->with('add', 'Success Add Management');
            return response()->json([
                'status' => 200,
                'message' => 'Success Add Management',
                'redirect_url' => route('admin.management.index'),
            ]);
        }
    }
    public function edit(Management $management): View
    {
        return view('admin.management.edit', new ManagementViewModel($management));
    }
    public function update(Request $request, Management $management)
    {
        if ($request->submit2 == 'en') {
            $validator = Validator::make($request->all(), [
                'title.' . $request->submit2 => ['required'],
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'title.' . $request->submit2 => ['required'],
            ]);
        }
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {

            $management->update( $validator->validated());

            return response()->json([
                'status' => 200,
                'message' => 'Update Management',
                'redirect_url' => route('admin.management.index'),
            ]);
        }

    }

    public function destroy(Request $request)
    {
        Management::whereIn('id', $request->ids)->delete();
        return redirect()->back()->with('delete', 'Delete Management');
    }
}
