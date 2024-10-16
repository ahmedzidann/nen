<?php
namespace App\Http\Controllers\User\FindUs;

use App\Models\Page;
use App\Models\Level;
use App\Models\State;
use App\Models\FindUs;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
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

    public function index(): View
    {
        $partner = Page::findOrFail(request()->page_id);
        $slider = Slider::where('page_id', $partner->id)->first();
        $countries = Country::whereHas('states', function ($q) {
            $q->whereHas('findus', function ($t) {$t->where('page_id', request()->page_id);});
        })->get();

        $locations = [];
        $zoom = 3;

        if ($partner) {
            $items = FindUs::where("page_id", request()->page_id)
                ->when(request()->state_id, function ($q) {
                    return $q->where('state_id', request()->state_id);
                })
                ->when(request()->country_id, function ($q) {
                    return $q->whereHas('state', function ($t) {
                        $t->where('country_id', request()->country_id);
                    });
                })->get();
            if (request()->state_id) {
                $zoom = 10;
            } elseif (request()->country_id) {
                $zoom = 5;
            }

            foreach ($items as $item) {
                $locations[] = ['lat' => $item->lat, "lng" => $item->lng];
            }
            // dd($zoom);
            $states = State::whereHas('findus')
                ->when(request()->country_id, function ($q) {
                    $q->where('country_id', request()->country_id);
                })->get();

            $levels = Level::whereHas('findus')->get();
            $certs = Certificate::whereHas('findus')->get();
            $specs = Specialization::whereHas('findus')->get();

            return view('user.find-us.index', ['tech' => $partner, 'items' => $items,
                'slider' => $slider,
                'countries' => $countries,
                "states" => $states,
                "locations" => $locations,
                "zoom" => $zoom,
                "levels" => $levels,
                "certs" => $certs,
                "specs" => $specs,
            ]);
        } else {
            abort(400, "error");
        }

    }

    public function getData(Request $request)
    {
        $query = FindUs::query()
            ->where("page_id", $request->page_id)
            ->when($request->state_id, function ($q) use ($request) {
                return $q->where('state_id', $request->state_id);
            })
            ->when($request->country_id, function ($q) use ($request) {
                return $q->whereHas('state', function ($t) use ($request) {
                    $t->where('country_id', $request->country_id);
                });

            });
            // dd($query->get());
        return DataTables::of($query)
            ->addColumn('country', function ($item) {
                return $item->state?->country?->title;
            })
            ->addColumn('flag_url', function ($item) {
                // return asset('content/images/small_icon/Flag_of_' . $item->state?->country?->title . '.svg.webp');
                return $item->state->country->getFirstMediaUrl('flag');
;
            })
            // ->addColumn('work_times', function ($item) {
            //     return [
            //         'from_at' => $item->from_at ? \Carbon\Carbon::parse($item->from_at)->format('l h:i A') : '',
            //         'to_at' => $item->to_at ? \Carbon\Carbon::parse($item->to_at)->format('l h:i A') : '',
            //     ];
            // })
            ->addColumn('map_url', function ($item) {
                return "https://www.google.com/maps/?q={$item->lat},{$item->lng}";
            })
            ->toJson();
    }
}
