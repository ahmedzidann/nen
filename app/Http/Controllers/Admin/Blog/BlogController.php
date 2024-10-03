<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\MediaCategory;
use App\Models\TranslationKey;
use App\Helper\FileUploadHelper;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\Blog\BlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::query();
            $language = app()->getLocale(); // Get current language

            return Datatables::of($data)
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
                                <a href="' . route('admin.blogs.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.blogs.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = MediaCategory::where('is_active', true)->get();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $blogData = $request->except(['banner', 'video', 'categories_id']);

        if ($request->hasFile('banner')) {
            $blogData['banner'] = FileUploadHelper::uploadImage($request->file('banner'), 'blog_banners');
        }

        if ($request->hasFile('video')) {
            $blogData['video'] = FileUploadHelper::uploadVideo($request->file('video'), 'blog_videos');
        }

        $blog = Blog::create($blogData);
        $blog->categories()->attach($request->categories_id);

        redirect()->route('admin.blogs.index')->with('success', 'Success Add Blog');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Blog',
            'redirect_url' => route('admin.blogs.index'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = MediaCategory::where('is_active', true)->get();
        $langs = TranslationKey::get();
	$blog->load('categories');
        return view('admin.blogs.edit', compact('blog', 'categories', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blogData = $request->except(['banner', 'video', 'categories_id']);

        $blogData['banner'] = FileUploadHelper::updateFile(
            $request->file('banner'),
            $blog->banner,
            'blog_banners'
        );

        $blogData['video'] = FileUploadHelper::updateFile(
            $request->file('video'),
            $blog->video,
            'blog_videos'
        );

        $blog->update($blogData);
        $blog->categories()->sync($request->categories_id);

        return response()->json([
            'status' => 200,
            'message' => 'Update Contact',
            'redirect_url' => route('admin.blogs.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        $blogs = Blog::whereIn('id', $request->ids)->get();
            foreach ($blogs as $blog) {
            // Delete banner file if exists
            if ($blog->banner) {
                FileUploadHelper::deleteFile($blog->banner);
            }

            // Delete video file if exists
            if ($blog->video) {
                FileUploadHelper::deleteFile($blog->video);
            }

            // You can add more file deletions here if needed
        }

        Blog::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Blog');
    }
}
