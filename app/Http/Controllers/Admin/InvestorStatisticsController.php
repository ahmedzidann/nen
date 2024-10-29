<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InvestorStatisticsRequest;
use App\Models\InvestorStatistics;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvestorStatisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = InvestorStatistics::query();
            $language = app()->getLocale(); // Get current language

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="checkbox[]" class="form-check-input blogs_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('created_at', function ($row) use ($language) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.investor-statistics.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.investor_statistics.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $years = InvestorStatistics::pluck('year');

        return view('admin.investor_statistics.create', compact('years'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvestorStatisticsRequest $request)
    {
        InvestorStatistics::create($request->validated());

        redirect()->route('admin.investor-statistics.index')->with('success', 'Success Add Investor Statistics');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Investor Statistics',
            'redirect_url' => route('admin.investor-statistics.index'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $investorStatistics = InvestorStatistics::findOrFail($id);
        $years = InvestorStatistics::pluck('year');
        $langs = TranslationKey::get();
        return view('admin.investor_statistics.edit', compact('years', 'investorStatistics', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvestorStatisticsRequest $request, $id)
    {
        InvestorStatistics::where('id', $id)->update($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Update Investor Statistics',
            'redirect_url' => route('admin.investor-statistics.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        InvestorStatistics::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Investor Statistics');
    }
}
