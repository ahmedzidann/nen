<?php
namespace App\Http\Controllers\User\DocValidation;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\IdentityRequest;
use App\Models\DocValidation;
use App\Models\Education;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\Slider;
use App\Models\SolutionTab;
use App\Models\StaticTable;
use App\Models\Tabs;
use App\Models\Testing;
use App\ViewModels\AboutView\IdentityTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

class DocValidationController extends Controller
{

    // public function index():View
    // {


    //     if(Route::currentRouteName() == 'education.tqs'){

    //         return $this->tqsView();
    //     };
    //     return $this->certificatesView();
    // }


    public function index():View
    {
        $partner = Page::findOrFail(request()->page_id);
        $slider   = Slider::where('page_id',$partner->id)->first();

        if($partner){
            $item = DocValidation::where("pages_id",request()->page_id)->active()->first();

            return view('user.doc-validation.index', ['tech'=>$partner,'item'=>$item,'slider'=>$slider]);
        }
        else abort(400, "error");
    }



}
