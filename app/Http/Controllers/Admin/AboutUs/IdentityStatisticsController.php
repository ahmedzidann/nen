<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use App\ViewModels\AboutView\StatisticsViewModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class IdentityStatisticsController extends Controller
{
    public function index(Request $request)
    {
        $language = app()->getLocale();
        if ($request->ajax()) {
            $data = Statistic::query()->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';})
                ->editColumn('id', function () {static $count = 0; $count++;return $count;})
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('created_at', function ($row) {return Carbon::parse($row->created_at)->format('Y-m-d');})
                ->addColumn('action', function ($row) {return '<div class="d-flex order-actions"> <a href="' . route('admin.about.statistics.edit', ['statistic' => $row->id]) . '" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
        return view('admin.about.statistics.view', new StatisticsViewModel());

    }
    public function create()
    {
        return view('admin.about.statistics.create', new StatisticsViewModel());
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title.*' => 'required',
            'value' => 'required|numeric|max:100|min:0',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        Statistic::create($validator->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Update Statistics',
            'redirect_url' => route('admin.about.statistics.index'),
        ]);
    }
    public function edit(Request $request, Statistic $statistic)
    {
        return view('admin.about.statistics.edit', new StatisticsViewModel($statistic));

    }
    public function update(Request $request, Statistic $statistic)
    {
        $validator = Validator::make($request->all(), [
            'title.' . $request->submit2 => 'required',
            'value' => 'sometimes|numeric|max:100|min:0',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        $statistic->update($validator->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Update Statistics',
            'redirect_url' => route('admin.about.statistics.index'),
        ]);

    }
    public function destroy(Request $request)
    {
        Statistic::whereIn('id', $request->ids)->delete();
        return redirect()->back()->with('delete', 'Delete Statistics');
    }
}
