<?php
namespace App\Http\Controllers\User\FindUs;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\IdentityRequest;
use App\Models\Certificate;
use App\Models\Country;
use App\Models\DocValidation;
use App\Models\Education;
use App\Models\FindUs;
use App\Models\Level;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\Slider;
use App\Models\SolutionTab;
use App\Models\Specialization;
use App\Models\State;
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

class FindUsController extends Controller
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
        $counties = Country::whereHas('states',function($q){
            $q->whereHas('findus',function($t){ $t->where('page_id',request()->page_id);});
        })->get();


        $locations = [];
        $zoom = 3;


        if($partner){
            $items   = FindUs::where("page_id",request()->page_id)
            ->when(request()->state_id, function($q){
                return $q->where('state_id', request()->state_id);
            })
            ->when(request()->country_id, function($q){
                return $q->whereHas('state',function($t){
                    $t->where( 'country_id',request()->country_id);
                });
            })->get();
            if(request()->state_id)  $zoom = 10;
            elseif(request()->country_id) $zoom = 5;
            foreach($items as $item){
                $locations[]=['lat'=>$item->lat , "lng"=>$item->lng];
            }
            // dd($zoom);
            $states = State::whereHas('findus')
            ->when(request()->country_id, function($q){
                $q->where( 'country_id',request()->country_id);
            })->get();

            $levels = Level::whereHas('findus')->get();
            $certs = Certificate::whereHas('findus')->get();
            $specs = Specialization::whereHas('findus')->get();

            return view('user.find-us.index', ['tech'=>$partner,'items'=>$items,
            'slider'=>$slider,
            'counties'=>$counties,
            "states"=>$states,
            "locations"=>$locations,
            "zoom" =>$zoom,
            "levels" =>$levels,
            "certs" =>$certs,
            "specs" =>$specs,
        ]);
        }
        else abort(400, "error");
    }



}
