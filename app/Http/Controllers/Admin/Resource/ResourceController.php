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
            $data = Resource::query();
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
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.resources.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
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
        $data = $request->validated();
        if (in_array($request->type, ['image', 'file']) && $request->hasFile('resource')) {
            $data['resource'] = FileUploadHelper::uploadImage($request->file('resource'), 'resources');
        }

        Resource::create($data);

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
        return view('admin.resources.edit', compact('resource', 'langs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResourceRequest $request, Resource $resource)
    {
        $data = $request->validated();

        if (in_array($request->type, ['image', 'file']) && $request->hasFile('resource')) {
            FileUploadHelper::deleteFile($resource->resource);
            $data['resource'] = FileUploadHelper::uploadImage($request->file('resource'), 'resources');
        }

        $resource->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Update Product Category',
            'redirect_url' => route('admin.resources.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        Resource::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Resources Deleted');
    }
}
