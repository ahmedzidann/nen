<?php
namespace App\Http\Controllers\User\AboutUs;
use App\Actions\StaticTable\StoreStaticTableAction;
use App\Actions\StaticTable\UpdateStaticTableAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\IdentityRequest;
use App\Models\OurTeam;
use App\Models\Page;
use App\Models\StaticTable;
use App\ViewModels\AboutView\IdentityTableViewModel;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    public function identity():View
    {
        $identity = Page::where('slug','identity')->first();
        if($identity){
            $identities = StaticTable::where("pages_id",$identity->id)->active()->get();
            return view('user.about.identity',['items'=>$identities]);
        }
        else abort(400, "error");
    }

    public function investors():View
    {
        $investor = Page::where('slug','investors')->first();
        if($investor){
            $identities = StaticTable::where("pages_id",$investor->id)->active()->get();
            return view('user.about.investors',['items'=>$identities]);
        }
        else abort(400, "error");
    }

    public function careers():View
    {
        $career = Page::where('slug','careers')->first();
        if($career){
            $careers = StaticTable::where("pages_id",$career->id)->active()->get();
            return view('user.about.careers',['items'=>$careers]);
        }
        else abort(400, "error");
    }




    public function awards():View
    {
        $investor = Page::where('slug','awards')->first();
        if($investor){
            $awards = StaticTable::where("pages_id",$investor->id)->active()->get();
            return view('user.about.award',['items'=>$awards]);
        }
        else abort(400, "error");
    }

    public function clients():View
    {
        $achievement = Page::where('slug','clients')->first();
        if($achievement){
            $achievements = StaticTable::where("pages_id",$achievement->id)->active()->get();
            return view('user.about.clients',['items'=>$achievements]);
        }
        else abort(400, "error");
    }

    public function our_team():View
    {
        $achievement = Page::where('slug','our-team')->first();
        if($achievement){
            $achievements = OurTeam::where("pages_id", $achievement->id)->active()->get();
            $achievements = OurTeam::where("pages_id", $achievement->id)->active()->get();
            return view('user.about.our-team', ['items'=>$achievements]);
        }
        else abort(400, "error");
    }

    public function achievements():View
    {
        $achievement = Page::where('slug','achievements')->first();
        if($achievement){
            $achievements = StaticTable::where("pages_id",$achievement->id)->active()->get();
            $years = $achievements->where('item','section-two')->pluck('years','years')->toArray();
            return view('user.about.achievements',['items'=>$achievements,'years'=>$years]);
        }
        else abort(400, "error");
    }

    public function certificates():View
    {
        return view('user.about.certificates');
    }

    public function partners():View
    {
        $partner = Page::where('slug','partners')->first();
        if($partner){
            $subPartners = $partner->childe;

            $partners = StaticTable::where("pages_id",$partner->id)->active()->get();
            return view('user.about.partners',['items'=>$partners,'subPartners'=>$subPartners]);
        }
        else abort(400, "error");
    }
}
