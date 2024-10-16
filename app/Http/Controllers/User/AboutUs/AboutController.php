<?php
namespace App\Http\Controllers\User\AboutUs;

use App\Enums\InvestorType;
use App\Http\Controllers\Controller;
use App\Models\Management;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\Slider;
use App\Models\StaticTable;
use App\Models\Statistic;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function identity(): View
    {
        $identity = Page::where('slug', 'identity')->first();
        $slider = Slider::where('page_id', $identity->id)->first();
        // dd($slider);
        $statistics = Statistic::limit(3)->get();
        if ($identity) {
            $identities = StaticTable::where("pages_id", $identity->id)->with('identityAttributes')->active()->get();
            return view('user.about.identity', ['items' => $identities, 'slider' => $slider, 'statistics' => $statistics]);
        } else {
            abort(400, "error");
        }

    }

    public function investors(): View
    {
        $investor = Page::where('slug', 'investors')->first();
        $slider = Slider::where('page_id', $investor->id)->first();

        if ($investor) {
            $items = StaticTable::where("pages_id", $investor->id)->active()->get();
            $subInvestors = StaticTable::where("pages_id", $investor->id)->active()->with('investorAttributes.country')->where('category', InvestorType::SUBDIDIARIES)->get();
            return view('user.about.investors', ['items' => $items, 'rows' => $subInvestors, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function careers(): View
    {
        $career = Page::where('slug', 'careers')->first();
        $slider = Slider::where('page_id', $career->id)->first();

        if ($career) {
            $careers = StaticTable::where("pages_id", $career->id)->active()
                ->orderBy('id', 'desc')->get();
            return view('user.about.careers', ['items' => $careers, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function awards(): View
    {
        $award = Page::where('slug', 'awards')->first();
        $slider = Slider::where('page_id', $award->id)->first();
        // dd($slider->getFirstMediaUrl('image'));
        if ($award) {
            $subAwards = $award->childe;
            $awards = StaticTable::where("pages_id", $award->id)->where('item', '!=', 'section-one')->active()->get();
            $fSection = StaticTable::where("pages_id", $award->id)->where('item', '=', 'section-one')->active()->first();
            return view('user.about.award', ['items' => $awards, 'subAwards' => $subAwards, 'fSection' => $fSection, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function clients(): View
    {
        $achievement = Page::where('slug', 'clients')->first();
        $slider = Slider::where('page_id', $achievement->id)->first();

        $subAwards = $achievement->childe;
        if ($achievement) {
            $achievements = StaticTable::where("pages_id", $achievement->id)->active()->get();

            return view('user.about.clients', ['items' => $achievements, 'subClients' => $subAwards, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function our_team(): View
    {
        $achievement = Page::where('slug', 'our-team')->first();
        $slider = Slider::where('page_id', $achievement->id)->first();
        $managements = Management::orderBy('sort','DESC')->get();

        if ($achievement) {
            return view('user.about.our-team', [
                'items' => OurTeam::where("pages_id", $achievement->id)->active()->orderBy('sort','ASC')->get(),
                'members' => OurTeam::where("pages_id", $achievement->id)->active()->where('management_id', $managements->first()->id)->orderBy('sort','DESC')->get(),
                'slider' => $slider, 'managements' => $managements,
            ]);
        } else {
            abort(400, "error");
        }

    }

    public function achievements(): View
    {
        $achievement = Page::where('slug', 'achievements')->first();
        $slider = Slider::where('page_id', $achievement->id)->first();

        if ($achievement) {
            $achievements = StaticTable::where("pages_id", $achievement->id)->active()->orderBy('years', 'DESC')
                ->orderBy('month', 'DESC')->get();
            $years = $achievements->where('item', 'section-two')->pluck('years', 'years')->toArray();

            return view('user.about.achievements', ['items' => $achievements, 'years' => $years, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function certificates(): View
    {
        $partner = Page::where('slug', 'certificates')->first();
        $slider = Slider::where('page_id', $partner->id)->first();

        if ($partner) {
            $subPartners = $partner->childe;
            $partners = StaticTable::where("pages_id", $partner->id)->active()->get();

            return view('user.about.certificates', ['items' => $partners, 'subPartners' => $subPartners, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function partners(): View
    {
        $partner = Page::where('slug', 'partners')->first();
        $slider = Slider::where('page_id', $partner->id)->first();

        if ($partner) {
            $subPartners = $partner->childe;

            $partners = StaticTable::where("pages_id", $partner->id)->with('media')->active()->get();

            return view('user.about.partners', ['items' => $partners, 'subPartners' => $subPartners, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function loadMorePartners(Request $request, $subPartnerId)
    {
        $partners = StaticTable::where('pages_id', $partner->id)
            ->where('childe_pages_id', $subPartnerId)
            ->active()
            ->paginate(10); // Adjust the number of items per page as needed

        return view('user.about.load_more_partners', ['partners' => $partners])->render();
    }

    public function getData($id)
    {
        $items = OurTeam::where('management_id', $id)->active()->get();
        $data = view('user.about.team.content', ['items' => $items, 'management' => Management::find($id)])->render();
        return response()->json(['data' => $data]);
    }
    public function getCompanies($type)
    {
        $investor = Page::where('slug', 'investors')->first();
        if ($type == 'subsidiaries') {
            $rows = StaticTable::where("pages_id", $investor->id)
                ->active()->with('investorAttributes.country')
                ->where('category', InvestorType::SUBDIDIARIES)
                ->get();
        } else {
            $rows = StaticTable::where("pages_id", $investor->id)
                ->active()->with('investorAttributes.country')
                ->where('category', InvestorType::SISTER_COMPANIES)
                ->get();
        }
        $data = view('user.about.companies.companies', ['rows' => $rows])->render();
        return response()->json(['data' => $data]);
    }
}
