<?php

namespace App\Http\Controllers\Admin\Makeme;

use App\Actions\Project\StoreProjectAction;
use App\Actions\Project\UpdateProjectAction;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Makeme\MakemeRequest;
use App\Models\Makeme;
use App\Models\Page;
use App\Models\Tabs;
use App\ViewModels\Makeme\MakemeViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Helper\FileUploadHelper;
class MakemeController extends Controller
{
    use ImageHelper;

    public function index(): View
    {
        return view('admin.makeme.view', new MakemeViewModel());
    }

    public function show(Request $request, $language)
    {
        if ($request->ajax()) {
            $data = Makeme::select('*')->latest();

           
            if (!empty($request->from_date) && !empty($request->to_date)) {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            $category = $request->category;
            $subcategory = $request->subcategory;

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('Page', function ($row) use ($language) {
                    return optional($row->Page)->translate('name', $language);
                })
                ->editColumn('created_at', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($row) use ($category, $subcategory, $request) {
                    $Tabs = Tabs::where('type', 'project')->get();
                    $options = '';
                    return '<div class="order-actions">
                        <a href="' . route('admin.makeme.edit', [$row->id, 'category' => $category, 'subcategory' => $subcategory]) . '" class="m-auto"><i class="bx bxs-edit"></i></a>'
                        ;
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
    }

    public function create(Request $request): View
    {
        
        return view('admin.makeme.create', new MakemeViewModel());
    }

    public function store(MakemeRequest $request)
    {
        $validator = $request->validationStore();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }

        $data = $validator->validated();
         if ($data['image']) {
                $data['image'] = FileUploadHelper::uploadImage($data['image'], 'markme');
        }
        Makeme::create($data);
        return response()->json([
            'status' => 200,
            'message' => 'Success Add markme',
            'redirect_url' => route('admin.makeme.index'),
        ]);
    }

    public function edit(Request $request, $id): View
    {
        $makeme = Makeme::find($id);
        return view('admin.makeme.edit', new MakemeViewModel($makeme));
    }

    public function update(MakemeRequest $request, $id)
    {
        $makeme = Makeme::find($id);
        $validator = $request->submit2 == 'en'
            ? $request->validationUpdateEn()
            : $request->validationUpdateAr();
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }

        $data = $validator->validated();
        if ($data['image'] ?? null) {
            // Delete old image if exists
            if ($makeme->image) {
                FileUploadHelper::deleteFile($makeme->image);
            }
            $data['image'] = FileUploadHelper::uploadImage($data['image'], 'markme');
        }
        $makeme->update($data);
        $this->UpdateImage($data, $makeme, 'Makeme');

        return response()->json([
            'status' => 200,
            'message' => 'Update Project',
            'redirect_url' => route('admin.project.index'),
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        foreach (Makeme::find($request->id) as $item) {
            $item->delete();
        }

        return redirect()->back()->with('delete', 'Delete Makeme');
    }
}
