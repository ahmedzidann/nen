<?php

namespace App\View\Components\Meta;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\View\Component;

class Meta extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $logoBlack = Setting::where('id',13)->first();
        $logoWhite = Setting::where('id',14)->first();
        return view('components.meta.meta',compact('logoWhite'));
    }
}
