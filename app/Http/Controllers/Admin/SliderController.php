<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Slider\StoreSliderAction;
use App\Actions\Slider\UpdateSliderAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\SliderRequest;
use App\Models\Slider;
use App\ViewModels\SliderView\SliderViewModel;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller {
    /**
    * Display a listing of the resource.
    */

    public function index():View
    {
        return view('admin.slider.view',new SliderViewModel());
    }
    public function show(Request $request,$language)
    {
            if ($request->ajax()) {
                $data = Slider::select('*')->latest();
                    if((!empty($request->from_date )) && (!empty($request->to_date))){
                            $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
                    }
                    $category = $request->category;
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('checkbox', function ($row) {return '<input type="checkbox" name="users_checkbox[]" class="form-check-input users_checkbox" value="'.$row->id.'" />';})
                        ->editColumn('id', function ()  { static $count = 0; $count++; return $count; })
                        ->editColumn('title', function ($row) use($language)  {
                                return $row->translate('title', $language);
                        })
                        ->editColumn('Page', function ($row) use($language)  {
                            return $row->Pages->translate('name', $language);
                        })
                        ->editColumn('created_at', function ($row) { return Carbon::parse($row->created_at)->format('Y-m-d'); })

                        ->addColumn('action', function($row) use ($category) {return'<div class="d-flex order-actions"> <a href="'.route('admin.slider.edit',[$row->id,'category='.$category]).'" class="m-auto"><i class="bx bxs-edit"></i></a> ';})
                        ->rawColumns(['checkbox','action'])
                        ->make(true);
            }

    }
    public function create(Request $request):View
    {
        return view('admin.slider.create',new SliderViewModel());
    }
    public function store(SliderRequest $request)
    {
            $validator = $request->validationStore();
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }else{
            app(StoreSliderAction::class)->handle($validator->validated());
            redirect()->route('admin.slider.index')->with('add','Success Add Slider');
            return response()->json([
                'status'=>200,
                'message'=>'Success Add Slider',
                'redirect_url' => route('admin.slider.index',['category='.$request->category]),
            ]);
        }
    }
    public function edit(Request $request,$id):View
    {
        $StaticTable =Slider::find($id);
        return view('admin.slider.edit',new SliderViewModel($StaticTable));
    }
    public function update(SliderRequest $request, $id)
    {
        $StaticTable =Slider::find($id);
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
            app(UpdateSliderAction::class)->handle($StaticTable,$validator->validated());
            return response()->json([
                'status'=>200,
                'message'=>'Update Slider',
                'redirect_url' => route('admin.slider.index'),
            ]);
        }

    }
    public function destroy(Request $request):RedirectResponse
    {
        foreach(Slider::find($request->id) as $static_table){$static_table->delete();}
        return redirect()->back()->with('delete','Delete Slider');
    }
}
