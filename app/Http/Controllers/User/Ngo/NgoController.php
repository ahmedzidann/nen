<?php

namespace App\Http\Controllers\User\Ngo;

use App\Http\Controllers\Controller;
use App\Models\Ngo;
use App\Models\Page;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NgoController extends Controller
{
    public function index(Request $request): View
    {
        $ngoPage = Page::findOrFail($request->page_id);
        $slider  = Slider::where('page_id', $ngoPage->id)->first();

        $subPages = $ngoPage->childe;
        $items    = Ngo::where('pages_id', $request->page_id)->where('status', 'Active')->latest()->first();

        return view('user.ngo.index', [
            'ngoPage'   => $ngoPage,
            'items'     => $items,
            'subPages'  => $subPages,
            'slider'    => $slider,
        ]);
    }
}
