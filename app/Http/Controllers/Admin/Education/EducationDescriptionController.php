<?php

namespace App\Http\Controllers\Admin\Education;

use App\Helper\FileUploadHelper;
use App\Helper\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\EducationDescription;
use App\Models\Page;
use App\Models\TranslationKey;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EducationDescriptionController extends Controller
{
    use ImageHelper;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EducationDescription::query()->with('education');
            $language = app()->getLocale(); // Get current language

            return Datatables::of($data)
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
                    return $row->education->slug;
                })
                ->editColumn('created_at', function ($row) use ($language) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.education-descriptions.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.education.education_description.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existsDescriptions = EducationDescription::pluck('page_id');
        $pages = Page::where('parent_id', 4)->whereNotIn('id', $existsDescriptions)->get();
        return view('admin.education.education_description.create', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'page_id' => 'required|numeric',
            'description.*' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = FileUploadHelper::uploadImage($request->file('image'), 'education_descriptions');
        }

        EducationDescription::create($validatedData);

        redirect()->route('admin.education-descriptions.index')->with('success', 'Success Add Education Description');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Education Description',
            'redirect_url' => route('admin.education-descriptions.index'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $description = EducationDescription::findOrFail($id);
        $langs = TranslationKey::get();
        return view('admin.education.education_description.edit', compact('description', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $description = EducationDescription::findOrFail($id);

        $validatedData = $request->validate([
            'description.*' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image validation
        ]);
        if ($request->hasFile('image')) {
            $validatedData['image'] = FileUploadHelper::updateFile(
                $request->file('image'),
                $description->image,
                'education_descriptions'
            );
        }

        $description->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => 'Update Education Description',
            'redirect_url' => route('admin.education-descriptions.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        $images = EducationDescription::whereIn('id', $request->ids)->get();
        foreach ($images as $image) {
            // Delete banner file if exists
            if ($image->image) {
                FileUploadHelper::deleteFile($image->image);
            }
        }

        EducationDescription::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Education Description');
    }
}
