<?php

namespace App\Http\Controllers\Admin\setting_testing_technology;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\testing_technology_sections\TestingTechnologySections;
use App\Models\Page;
use App\Models\TestingTechnologySection;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\RedirectResponse;
use DB;

class SettingTestingTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = TestingTechnologySection::query();
            $language = app()->getLocale(); // Get current language

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="checkbox[]" class="form-check-input blogs_checkbox" value ="' . $row->id . '" />';
                })
                ->addColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use($language)  { 
                                return $row->translate('title', $language);
                        })
                    
                ->addColumn('action', function ($row) {
                    
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.setting_technology_testing.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.setting_testing_technology.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Page::whereNull('parent_id')->get();
        $designs= DB::table('sections_design')->get();
        
        return view('admin.setting_testing_technology.create', compact('categories','designs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestingTechnologySections $request)
    {  
             if($request->image_1)
             {
                   $image =$request->image_1;
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/setting_testing_technology', $fileName);
                    $data['image_1']=$fileName; 
             }
             if($request->image_2)
             {
                   $image =$request->image_2;
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/setting_testing_technology', $fileName);
                    $data['image_2']=$fileName; 
              }
                   
             
            $data['type'] = $request->main_category_id;
            $data['main_category_id'] = $request->main_category_id;
            $data['sub_category_id'] = $request->sub_category_id;
            $data['design_section_id'] = $request->design_section_id;
            $data['title'] =$request->title;
             $data['description'] = $request->description;
            $data['sort'] = $request->sort;
            TestingTechnologySection::create($data);

       // redirect()->route('admin.setting_technology_testing.index')->with('success', 'Success Add Product Category');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Section technology testing',
            'redirect_url' => route('admin.setting_technology_testing.index'),
        ]);

    }

    /**
     * Show the form for editing the specified sidebar resource.
     */
    public function edit($id)
    {
      
        $translation = TranslationKey::get();
        $resource = TestingTechnologySection::findOrFail($id);
        $categories = Page::whereNull('parent_id')->get();
        $subcategories = Page::where('slug',$resource->sub_category_id)->first();
        $designs= DB::table('sections_design')->get();
        return view('admin.setting_testing_technology.edit', compact('resource','subcategories', 'translation','designs','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(TestingTechnologySections $request, $id)
{
    $section = TestingTechnologySection::findOrFail($id);
    $lang = $request->submit2;
    // إذا التبويب هو English (تحديث كل القيم)
    if($request->image_1)
             {
                   $image =$request->image_1;
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/setting_testing_technology', $fileName);
                    $data['image_1']=$fileName; 
                      $section->image_1 =  $data['image_1'];
             }
             if($request->image_2)
             {
                   $image =$request->image_2;
                    $fileName = time() . '_' . $image->getClientOriginalName();
                    $image->storeAs('public/setting_testing_technology', $fileName);
                    $data['image_2']=$fileName; 
                     $section->image_2 =  $data['image_2'];
                    
              }
    if ($request->submit2 == 'en') {

        $section->type = $request->main_category_id;
        $section->main_category_id = $request->main_category_id;
        $section->sub_category_id = $request->sub_category_id;
        $section->design_section_id = $request->design_section_id;
        
          
        // تحديث كامل العنوان (يجب أن يكون مصفوفة)
        $section->setTranslation('title', $lang, $request->title[$lang]);
        $section->setTranslation('description', $lang, $request->description[$lang]);

        $section->sort = $request->sort;

    } else {
        // تحديث لغة أخرى (ar مثلاً)
           // en / ar

        // تحديث ترجمة واحدة فقط
        $section->setTranslation('title', $lang, $request->title[$lang]);
         $section->setTranslation('description', $lang, $request->description[$lang]);
    }

       $section->save();

    return response()->json([
        'status' => 200,
        'message' => 'Success Edit Section technology testing',
        'redirect_url' => route('admin.setting_technology_testing.index'),
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
      
        try {
            
           TestingTechnologySection::whereIn('id', $request->ids)->delete();
            return response()->json([
                'success' => true,
                'message' => 'TestingTechnologySection deleted successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting TestingTechnologySection: ' . $e->getMessage(),
            ], 500);
        }
    }
    

    
}
