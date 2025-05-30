<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResourceRequest;
use App\Models\Page;
use App\Models\Resource;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Resource::query()->select('main_category', 'sub_category')->distinct();
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
                    $id = Resource::query()->where(['main_category' => $row->main_category, 'sub_category' => $row->sub_category])->first()->id;
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.resources.edit', $id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.resources.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Page::whereNull('parent_id')->get();
        return view('admin.resources.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResourceRequest $request)
    {
        foreach ($request->type as $index => $type) {
            if ($type == 'image' && $request->resource[$index]) {
                $data['resource'] = FileUploadHelper::uploadImage($request->resource[$index], 'resources');
            }
            if ($type == 'file' && $request->resource[$index]) {
                $data['resource'] = FileUploadHelper::uploadFile($request->resource[$index], 'resources');
            }
            if ($type == 'comp' && $request->resource[$index]) {
                $data['resource'] = FileUploadHelper::uploadFile($request->resource[$index], 'resources');
            }
            if ($type == 'word' && $request->resource[$index]) {
                $data['resource'] = FileUploadHelper::uploadFile($request->resource[$index], 'resources');
            }
            if ($type == 'url' && $request->resource[$index]) {
                $data['resource'] = $request->resource[$index];
            }

            $data['main_category'] = $request->main_category;
            $data['sub_category'] = $request->sub_category;
            $data['title'] = $request->title[$index];
            $data['type'] = $type;
            Resource::create($data);
        }

        redirect()->route('admin.resources.index')->with('success', 'Success Add Product Category');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Resource',
            'redirect_url' => route('admin.resources.index'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        $categories = Page::whereNull('parent_id')->get();
        $langs = TranslationKey::get();
        $resources = Resource::where([
            "main_category" => $resource->main_category,
            "sub_category" => $resource->sub_category,
        ])->get();
        return view('admin.resources.edit', compact('resource', 'resources', 'langs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResourceRequest $request, Resource $id)
    {
        $validData = $request->validated();
        foreach ($validData['keys'] as $index => $key) {
            $data = [];
            // Handle file uploads if present
            if (isset($validData['resource'][$index])) {
                $resource = Resource::find($key);

                if ($request->type[$index] == 'image') {
                    // Delete old image if exists
                    if ($resource->resource) {
                        FileUploadHelper::deleteFile($resource->resource);
                    }
                    $data['resource'] = FileUploadHelper::uploadImage($validData['resource'][$index], 'resources');
                }

                if ($request->type[$index] == 'file' || $request->type[$index] == 'word' || $request->type[$index] == 'comp' ) {
                    // Delete old file if exists
                    if ($resource->resource) {
                        FileUploadHelper::deleteFile($resource->resource);
                    }
                    $data['resource'] = FileUploadHelper::uploadFile($validData['resource'][$index], 'resources');

                }
                if ($request->type[$index] == 'url') {
                    // Delete old file if exists
                    if ($resource->resource) {
                        FileUploadHelper::deleteFile($resource->resource);
                    }
                    $data['resource'] = $validData['resource'][$index];
                }

            }

            // Update basic information
            $data['main_category'] = $validData['main_category'];
            $data['sub_category'] = $validData['sub_category'];
            $data['title'] = $validData['title'][$index];
            $data['type'] = $validData['type'][$index];
            dump($data);
            // Update the resource record
            Resource::where('id', $key)->update($data);
        }

        $newData = array_diff_key($validData['title'], $validData['keys']);

        if (count($newData) > 0) {
            foreach ($newData as $index => $key) {
                $new = [];
                if ($request->type[$index] == 'image') {
                    $new['resource'] = FileUploadHelper::uploadImage($validData['resource'][$index], 'resources');
                }

                if ($request->type[$index] == 'file') {
                    $new['resource'] = FileUploadHelper::uploadFile($validData['resource'][$index], 'resources');
                }
                if ($request->type[$index] == 'url') {
                    $new['resource'] = $validData['resource'][$index];
                }

                // Update basic information
                $new['main_category'] = $validData['main_category'];
                $new['sub_category'] = $validData['sub_category'];
                $new['title'] = $validData['title'][$index];
                $new['type'] = $validData['type'][$index];

                // Update the resource record
                Resource::create($new);
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'Success Update Resource',
            'redirect_url' => route('admin.resources.index'),
        ]);
    }

    public function destroy(Resource $resource)
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        try {
            foreach ($request->categories as $category) {
                // First get all resources that match the category criteria
                $resources = Resource::where([
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
                Resource::where([
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
        $resource = Resource::find($resource_id);

        if ($resource) {
            // Delete the record
            $resource->delete();
            return response()->json(['message' => 'Resource deleted successfully!']);
        } else {
            // Return an error response if the record does not exist
            return response()->json(['message' => 'Resource not found.'], 404);
        }
    }
}
