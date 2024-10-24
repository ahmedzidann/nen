<?php

namespace App\Http\Controllers\Admin\Footer;

use App\Models\Footer;
use App\Enums\FooterType;
use Illuminate\Http\Request;
use App\Models\TranslationKey;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\FooterRequest;

class FooterController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Footer::query();
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
                ->editColumn('type', function ($row) use ($language) {
                    return FooterType::getName($row->type);
                })
                ->editColumn('created_at', function ($row) use ($language) {
                    return $row->created_at->format('Y-m-d');
                })
                ->addColumn('action', function ($row) {
                    return '<div class="d-flex order-actions">
                                <a href="' . route('admin.footer.edit', $row->id) . '" class="m-auto"><i class="bx bxs-edit"></i></a>
                            </div>';
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }

        return view('admin.footer.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FooterRequest $request)
    {
        $footer = Footer::create($request->validated());

        redirect()->route('admin.footer.index')->with('success', 'Success Add Data Footer');
        return response()->json([
            'status' => 200,
            'message' => 'Success Add Blog',
            'redirect_url' => route('admin.footer.index'),
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer)
    {
        $langs = TranslationKey::get();
        return view('admin.footer.edit', compact('footer', 'langs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterRequest $request, Footer $footer)
    {
        $footer->update($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Update Data Footer',
            'redirect_url' => route('admin.footer.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bulkDelete(Request $request)
    {
        Footer::whereIn('id', $request->ids)->delete();

        return redirect()->back()->with('success', 'Delete Data Footer');
    }
}
