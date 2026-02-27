<?php

namespace App\Http\Controllers\Admin\setting_testing_technology;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\testing_technology_sections\TestingTechnologySections;
use App\Models\Page;
use App\Models\TestingTechnologySection;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class SettingTestingTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $type)
    {
        // تحقق من النوع
        if (!in_array($type, ['testing', 'technology'])) {
            abort(404);
        }

        if ($request->ajax()) {

            // 🔥 فلترة بناءً على النوع
            $data = TestingTechnologySection::where('type', $type);
            $language = app()->getLocale();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="checkbox[]" class="form-check-input blogs_checkbox" value ="' . $row->id . '" />';
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->addColumn('action', function ($row) use ($type) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.setting_technology_testing.edit', [$type, $row->id]) . '" class="m-auto">
                                    <i class="bx bxs-edit"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.setting_testing_technology.view', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($type)
    {
        if (!in_array($type, ['testing', 'technology'])) {
            abort(404);
        }

        $categories = Page::whereNull('parent_id')->where('slug',$type)->get();
        $designs = DB::table('sections_design')->get();

        return view('admin.setting_testing_technology.create', compact('categories', 'designs', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestingTechnologySections $request, $type)
    {
        if (!in_array($type, ['testing', 'technology'])) {
            abort(404);
        }

        $data = [];

        if ($request->image_1) {
            $image = $request->image_1;
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/setting_testing_technology', $fileName);
            $data['image_1'] = $fileName;
        }

        if ($request->image_2) {
            $image = $request->image_2;
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/setting_testing_technology', $fileName);
            $data['image_2'] = $fileName;
        }

        $data['type'] = $type; // 🔥 النوع جاي من الـ URL
        $data['main_category_id'] = $request->main_category_id;
        $data['sub_category_id'] = $request->sub_category_id;
        $data['design_section_id'] = $request->design_section_id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['sort'] = $request->sort;

        TestingTechnologySection::create($data);

        return response()->json([
            'status' => 200,
            'message' => 'Success Add Section',
            'redirect_url' => route('admin.setting_technology_testing.index', $type),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type, $id)
    {
        if (!in_array($type, ['testing', 'technology'])) {
            abort(404);
        }

        $translation = TranslationKey::get();
        $resource = TestingTechnologySection::where('type', $type)->findOrFail($id);
        $categories = Page::whereNull('parent_id')->get();
        $designs = DB::table('sections_design')->get();

        return view('admin.setting_testing_technology.edit',
            compact('resource', 'translation', 'designs', 'categories', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestingTechnologySections $request, $type, $id)
    {
        if (!in_array($type, ['testing', 'technology'])) {
            abort(404);
        }

        $section = TestingTechnologySection::where('type', $type)->findOrFail($id);
        $lang = $request->submit2;

        if ($request->image_1) {
            $image = $request->image_1;
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/setting_testing_technology', $fileName);
            $section->image_1 = $fileName;
        }

        if ($request->image_2) {
            $image = $request->image_2;
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/setting_testing_technology', $fileName);
            $section->image_2 = $fileName;
        }

        if ($lang == 'en') {

            $section->main_category_id = $request->main_category_id;
            $section->sub_category_id = $request->sub_category_id;
            $section->design_section_id = $request->design_section_id;
            $section->sort = $request->sort;
        }

        $section->setTranslation('title', $lang, $request->title[$lang]);
        $section->setTranslation('description', $lang, $request->description[$lang]);

        $section->save();

        return response()->json([
            'status' => 200,
            'message' => 'Success Edit Section',
            'redirect_url' => route('admin.setting_technology_testing.index', $type),
        ]);
    }

    /**
     * Bulk delete
     */
    public function bulkDelete(Request $request)
{
    try {
        // تأكد أن ids موجودة
        if(!$request->ids || !is_array($request->ids)){
            return response()->json([
                'success' => false,
                'message' => 'No IDs provided.'
            ], 400);
        }

        TestingTechnologySection::whereIn('id', $request->ids)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted successfully',
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(),
        ], 500);
    }
}
}