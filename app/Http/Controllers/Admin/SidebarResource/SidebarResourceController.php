<?php

namespace App\Http\Controllers\Admin\SidebarResource;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SidebarResourceRequest;
use App\Models\Page;
use App\Models\SidebarResource;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SidebarResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = SidebarResource::query()->select('main_category', 'sub_category')->distinct();
            $language = app()->getLocale(); // Get current language

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="checkbox[]" class="form-check-input blogs_checkbox" data-sub-category="' . $row->sub_category . '"  data-main-category="' . $row->main_category . '" />';
                })
                ->addColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->addColumn('action', function ($row) {
                    $id = SidebarResource::query()->where(['main_category' => $row->main_category, 'sub_category' => $row->sub_category])->first()->id;
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.sidebar-resources.edit', $id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.sidebar_resources.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Page::whereNull('parent_id')->get();
        return view('admin.sidebar_resources.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SidebarResourceRequest $request)
    {
        foreach ($request->title as $index => $title) {
            if ($request->image[$index]) {
                $data['resource'] = FileUploadHelper::uploadImage($request->image[$index], 'sidebar_resources');
            }
            $data['main_category'] = $request->main_category;
            $data['sub_category'] = $request->sub_category;
            $data['title'] = $title;
            $data['sub_title'] = $request->sub_title[$index];
            $data['type'] = $request->type[$index];
            $data['url'] = $request->url[$index];
            SidebarResource::create($data);
        }

        redirect()->route('admin.sidebar-resources.index')->with('success', 'Success Add Product Category');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Sidebar Resource',
            'redirect_url' => route('admin.sidebar-resources.index'),
        ]);

    }

    /**
     * Show the form for editing the specified sidebar resource.
     */
    public function edit($id)
    {
        $resource = SidebarResource::findOrFail($id);
        $categories = Page::whereNull('parent_id')->get();
        $langs = TranslationKey::get();
        $resources = SidebarResource::where([
            "main_category" => $resource->main_category,
            "sub_category" => $resource->sub_category,
        ])->get();
        return view('admin.sidebar_resources.edit', compact('resource', 'resources', 'langs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SidebarResourceRequest $request, $id)
    {
        $validData = $request->validated();

        foreach ($validData['keys'] as $index => $key) {
            $data = [];

            // Handle file uploads if present
            if (isset($validData['image'][$index])) {
                $resource = SidebarResource::find($key);

                if ($request->image[$index]) {
                    // Delete old image if exists
                    if ($resource->resource) {
                        FileUploadHelper::deleteFile($resource->resource);
                    }
                    $data['resource'] = FileUploadHelper::uploadImage($validData['image'][$index], 'sidebar-resources');
                }
            }

            // Update basic information
            $data['main_category'] = $validData['main_category'];
            $data['sub_category'] = $validData['sub_category'];
            $data['title'] = $validData['title'][$index];
            $data['sub_title'] = $validData['sub_title'][$index];
            $data['type'] = $validData['type'][$index];
            $data['url'] = $validData['url'][$index];
            $data['show_in_home'] = $validData['show_in_home'];
            // Update the resource record
            SidebarResource::where('id', $key)->update($data);
        }
        $newData = array_diff_key($validData['title'], $validData['keys']);
        if (count($newData) > 0) {
            foreach ($newData as $index => $key) {
                $new = [];
                if ($request->image[$index]) {
                    $new['resource'] = FileUploadHelper::uploadImage($validData['image'][$index], 'sidebar-resources');
                }

                // Update basic information
                $new['main_category'] = $validData['main_category'];
                $new['sub_category'] = $validData['sub_category'];
                $new['title'] = $validData['title'][$index];
                $new['sub_title'] = $validData['sub_title'][$index];
                $new['type'] = $validData['type'][$index];
                $new['url'] = $validData['url'][$index];

                // Update the resource record
                SidebarResource::create($new);
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'Success Update Resource',
            'redirect_url' => route('admin.sidebar-resources.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        try {
            foreach ($request->categories as $category) {
                // First get all resources that match the category criteria
                $resources = SidebarResource::where([
                    "main_category" => $category["main_category"],
                    "sub_category" => $category["sub_category"],
                ])->get();

                // Delete associated files first
                foreach ($resources as $resource) {
                    if ($resource->type === 'image' || $resource->type === 'file') {
                        FileUploadHelper::deleteFile($resource->resource);
                    }
                }

                // Then delete the records
                SidebarResource::where([
                    "main_category" => $category["main_category"],
                    "sub_category" => $category["sub_category"],
                ])->delete();
            }

            return response()->json([
                'success' => true,
                'message' => 'Resources deleted successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting resources: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function deleteResource($resource_id)
    {
        $resource = SidebarResource::find($resource_id);

        if ($resource) {
            // Delete the record
            $resource->delete();
            return response()->json(['message' => 'Resource deleted successfully!']);
        } else {
            // Return an error response if the record does not exist
            return response()->json(['message' => 'Resource not found.'], 404);
        }
    }

    public function getUpperResources(Request $request)
    {
        $rows = SidebarResource::where(['main_category' => $request->main_category, 'sub_category' => $request->sub_category])->where('type', 1)->get();
        $view = view('user.layout.includes.upper_section', compact('rows'))->render();
        return response()->json(['status' => 'success', 'data' => $view]);
    }
    public function getLowerResources(Request $request)
    {
        $rows = SidebarResource::where(['main_category' => $request->main_category, 'sub_category' => $request->sub_category])->where('type', 2)->get();
        $view = view('user.layout.includes.lower_section', compact('rows'))->render();
        return response()->json(['status' => 'success', 'data' => $view]);
    }
}
