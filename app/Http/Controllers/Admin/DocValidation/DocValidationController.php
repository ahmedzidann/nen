<?php

namespace App\Http\Controllers\Admin\DocValidation;

use App\Actions\DocValidation\UpdateDocValidationAction;
use App\Actions\Education\UpdateEducationAction;
use App\Actions\DocValidation\StoreDocValidationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DocValidation\DocValidationRequest;
use App\Http\Requests\Admin\Education\EducationRequest;
use App\Models\DocValidation;
use App\Models\Education;
use App\Models\Page;
use App\ViewModels\DocValidationView\DocValidationViewModel;
use App\ViewModels\EducationView\EducationViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DocValidationController extends Controller
{
    //
    public function index(Request $request)
    {


        //   return  Artisan::call('storage:link');

        return view('admin.docValidation.view',new DocValidationViewModel());
    }
    public function show(Request $request,$language)
    {

        $childe_pages_id=Page::where('slug',$request->subcategory)->first()->id??null;


        if ($request->ajax()) {



            $data = DocValidation::query()->latest();

            if ($request->subcategory){
                $data->where('pages_id',$childe_pages_id);
            }
            if((!empty($request->from_date )) && (!empty($request->to_date))){
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            $category = $request->category;
            $subcategory = $request->subcategory;
            $item = $request->item ??"";
//            $data=DocValidation::query();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                ->editColumn('title', function ($row) use($language)  {
                    return $row->translate('title', $language);
                })
                ->editColumn('description', function ($row) use($language)  {

                    return $row->translate('title', $language);

                })
                ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })

                ->addColumn('action', function($row) use ($category,$subcategory,$item)
                {return'<div class="d-flex order-actions"> <a href="'.route('admin.doc-validation.edit',[$row->id,'category='.$category,'subcategory='.$subcategory]).'" class="m-auto"><i class="bx bxs-edit"></i></a></div> ';})
                ->rawColumns(['checkbox','action'])
                ->make(true);
        }

    }
    public function create(Request $request):View
    {
        return view('admin.docValidation.create',new DocValidationViewModel());
    }
    public function store(DocValidationRequest $request)
    {

        $validator = $request->validationStore();
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{

            app(StoreDocValidationAction::class)->handle($validator->validated());
            redirect()->route('admin.doc-validation.index')->with('add','Success Add Doc Validation');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Doc Validation',
                'redirect_url' => route('admin.doc-validation.index',['category='.$request->category,'subcategory='.$request->subcategory]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =DocValidation::find($id);
        return view('admin.docValidation.edit',new DocValidationViewModel($StaticTable));
    }
    public function update(DocValidationRequest $request, $id)
    {


        $StaticTable =DocValidation::find($id);
        if($request->submit2=='en'){
            $validator = $request->validationUpdateEn();
        }else{
            $validator = $request->validationUpdateAr();
        }
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            // dd($validator->validated());
            app(UpdateDocValidationAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update Education',
                'redirect_url' => route('admin.doc-validation.index',['category='.$request->category,'subcategory='.$request->subcategory]),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {

        foreach(DocValidation::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete Doc Validation');
    }
}
