<?php

namespace App\Http\Controllers\Admin\FeatureAdvantages;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helper\FileUploadHelper;
use App\Models\FeatureAdvantages;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\FeatureAdvantagesDetails;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\FeatureAdvantages\StoreFeatureAdvantagesAction;
use App\Actions\FeatureAdvantages\UpdateFeatureAdvantagesAction;
use App\ViewModels\FeatureAdvantagesView\FeatureAdvantagesViewModel;
use App\Http\Requests\Admin\FeatureAdvantages\FeatureAdvantagesRequest;

class FeatureAdvantagesController extends Controller
{
    public function index()
    {
        return view('admin.feature_advantages.view', new FeatureAdvantagesViewModel());
    }
    public function show(Request $request, $language)
    {
        if ($request->ajax()) {

            $data = FeatureAdvantages::select('*')->latest();
            if ((!empty($request->from_date)) && (!empty($request->to_date))) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('description', function ($row) use ($language) {
                    return Str::limit($row->translate('description', $language), 100, '...') ;
                })
                ->editColumn('Page2', function ($row) use ($language) {

                    if (!empty($row->Page)) {
                        return $row->Page->translate('name', $language);
                    }
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })

                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions"> <a href="' . route('admin.feature-advantages.edit', [$row->id]) . '" class="m-auto"><i class="bx bxs-edit"></i></a></div> ';
                })
                ->rawColumns(['checkbox', 'action', 'description'])
                ->make(true);
        }
    }
    public function create(Request $request): View
    {
        return view('admin.feature_advantages.create', new FeatureAdvantagesViewModel());
    }
    public function store(FeatureAdvantagesRequest $request)
    {
        app(StoreFeatureAdvantagesAction::class)->handle($request->validated());
        redirect()->route('admin.feature-advantages.index')->with('add', 'Success Add Feature Advantages');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Feature Advantages',
            'redirect_url' => route('admin.feature-advantages.index'),
        ]);
    }
    public function edit(Request $request, $id): View
    {
        $StaticTable = FeatureAdvantages::find($id);
        return view('admin.feature_advantages.edit', new FeatureAdvantagesViewModel($StaticTable));
    }
    public function update(FeatureAdvantagesRequest $request, $id)
    {
        $StaticTable = FeatureAdvantages::find($id);
        app(UpdateFeatureAdvantagesAction::class)->handle($StaticTable, $request->validated());
        return response()->json([
            'status' => 200,
            'message' => 'Update Feature Advantages',
            'redirect_url' => route('admin.feature-advantages.index'),
        ]);
    }
    public function destroy(Request $request): RedirectResponse
    {
        foreach (FeatureAdvantages::find($request->id) as $static_table) {
            $static_table->delete();
        }
        return redirect()->back()->with('delete', 'Delete Feature Advantages');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        $images = FeatureAdvantagesDetails::whereIn('feature_advantage_id', $request->id)->get();
        foreach ($images as $image) {
            // Delete banner file if exists
            if ($image->image) {
                FileUploadHelper::deleteFile($image->image);
            }
        }
        FeatureAdvantages::whereIn('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Delete Education Description');
    }
}
