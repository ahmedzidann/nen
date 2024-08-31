<?php
namespace App\Http\Controllers\User\AboutUs;

use App\Enums\InvestorType;
use App\Http\Controllers\Controller;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\Slider;
use App\Models\StaticTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function identity(): View
    {
        $identity = Page::where('slug', 'identity')->first();
        $slider = Slider::where('page_id', $identity->id)->first();

        if ($identity) {
            $identities = StaticTable::where("pages_id", $identity->id)->with('identityAttributes')->active()->get();
            return view('user.about.identity', ['items' => $identities, 'slider' => $slider]);
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
            $subInvestors = StaticTable::where("pages_id", $investor->id)->active()->with('investorAttributes')->whereHas('investorAttributes', fn($q) => $q->where('category', InvestorType::SUBDIDIARIES))->get();
            $sisInvestors = StaticTable::where("pages_id", $investor->id)->active()->with('investorAttributes' )->whereHas('investorAttributes' , fn($q) => $q->where('category', InvestorType::SISTER_COMPANIES))->get();
            return view('user.about.investors', ['items' => $items, 'sisInvestors' => $sisInvestors, 'subInvestors' => $subInvestors, 'slider' => $slider]);
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

        if ($achievement) {
            $achievements = OurTeam::where("pages_id", $achievement->id)->active()->get();
            $achievements = OurTeam::where("pages_id", $achievement->id)->active()->get();
            return view('user.about.our-team', ['items' => $achievements, 'slider' => $slider]);
        } else {
            abort(400, "error");
        }

    }

    public function achievements(): View
    {
        $achievement = Page::where('slug', 'achievements')->first();
        $slider = Slider::where('page_id', $achievement->id)->first();

        if ($achievement) {
            $achievements = StaticTable::where("pages_id", $achievement->id)->active()->get();
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
}
