<?php
namespace App\Http\Controllers\User\Technology;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\IdentityRequest;
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
use App\Models\Technology;


class TechnologyContoller extends Controller
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
            $items = Technology::where("pages_id",request()->page_id)->active()->get();

            $subPartners = $partner->childe;
            // $partners = Testing::whereIn("pages_id",$subPartners->pluck('id')->toArray())->active()->get();
            // dd($partners);

            //  return view('user.about.identity',['items'=>$identities,'slider'=>$slider]);
            return view('user.technology.index', ['tech'=>$partner,'items'=>$items,'slider'=>$slider]);
        }
        else abort(400, "error");
    }

    public function identity():View
    {
        $identity = Page::where('slug','identity')->first();
        $slider   = Slider::where('page_id',$identity->id)->first();


        if($identity){
            $identities = StaticTable::where("pages_id",$identity->id)->active()->get();
            return view('user.about.identity',['items'=>$identities,'slider'=>$slider]);
        }
        else abort(400, "error");
    }

    public function tqsView():View
    {
        $partner = Page::findOrFail(request()->page_id);
        $slider   = Slider::where('page_id',$partner->id)->first();

        if($partner){
            $subPartners = $partner->childe;
            $partners = Education::whereIn("pages_id",$subPartners->pluck('id')->toArray())->active()->get();
            // dd($partners);

            return view('user.education.tqs',['partner'=>$partner,'items'=>$partners,'subPartners'=>$subPartners,'slider'=>$slider]);
        }
        else abort(400, "error");
    }

}
