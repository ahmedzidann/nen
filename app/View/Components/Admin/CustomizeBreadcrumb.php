<?php

namespace App\View\Components\Admin;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomizeBreadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
     protected $name;
     protected $type;
     protected $routeView;
    public function __construct($name,$type,$routeView)
    {
        $this->name = $name;
        $this->type = $type;
        $this->routeView = $routeView;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
    $request = Request();
        // dd($request->subsubcategory);
        return view('components.admin.customize-breadcrumb',
        [
        'name'=>$this->name,
        'type'=>$this->type,
        'routeView'=>$this->routeView,
        'category'=>Page::where('slug',Request('category'))->first(),
        'subcategory'=>Page::where('slug',Request('subcategory'))->first(),
        'subsubcategory'=>Page::where('slug',Request('subsubcategory'))->first(),
        ]);
    }
}
