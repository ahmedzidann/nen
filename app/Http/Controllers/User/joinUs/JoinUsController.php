<?php
namespace App\Http\Controllers\User\joinUS;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\FindUs;
use App\Models\Level;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Specialization;
use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JoinUsController extends Controller
{
    
    public function index($id=null): View
    {
       
        $page = Page::findOrFail(9);
        $slider = Slider::where('page_id', $page->id)->first();
        $categories = Page::where('parent_id', 9)->get();
        return view('user.join-us.index', ['slider'=> $slider,'categories'=>$categories]);

    }

    public function static_page($id=null): View
    {
     
        return view('user.join-us.static_page', []);

    }

}
