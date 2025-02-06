<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\MediaCategoryRequest;
use App\Models\MediaCategory;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MediaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MediaCategory::query();
            $language = app()->getLocale(); // Get current language

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    return '<input type="checkbox" name="blogs_checkbox[]" class="form-check-input blogs_checkbox" value="' . $row->id . '" />';
                })
                ->editColumn('id', function () {
                    static $count = 0;
                    $count++;
                    return $count;
                })
                ->editColumn('title', function ($row) use ($language) {
                    return $row->translate('title', $language);
                })
                ->editColumn('mini_desc', function ($row) use ($language) {
                    return $row->translate('mini_desc', $language);
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.media-categories.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.media_category.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.media_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaCategoryRequest $request)
    {
        $categoryData = $request->validated();
        if ($request->hasFile('image')) {
            $categoryData['image'] = FileUploadHelper::uploadImage($request->file('image'), 'media_category');
        }

        MediaCategory::create($categoryData);

        redirect()->route('admin.media-categories.index')->with('success', 'Success Add Category');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Category',
            'redirect_url' => route('admin.media-categories.index'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = MediaCategory::findOrFail($id);
        $langs = TranslationKey::get();
        return view('admin.media_category.edit', compact('category', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MediaCategoryRequest $request, $id)
    {
        $category = MediaCategory::findOrFail($id);
        $categoryData = $request->validated();
        if ($request->has('image')) {
            $categoryData['image'] = FileUploadHelper::updateFile(
                $request->file('image'),
                $category->image,
                'media_category'
            );
        }

        $category->update($categoryData);

        return response()->json([
            'status' => 200,
            'message' => 'Update Category',
            'redirect_url' => route('admin.media-categories.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        $blogs = MediaCategory::whereIn('id', $request->ids)->get();
        foreach ($blogs as $blog) {
            // Delete banner file if exists
            if ($blog->image) {
                FileUploadHelper::deleteFile($blog->image);
            }
            // You can add more file deletions here if needed
        }

        MediaCategory::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Category');
    }
}
