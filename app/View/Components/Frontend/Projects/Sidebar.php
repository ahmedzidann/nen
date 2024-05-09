<?php

namespace App\View\Components\Frontend\Projects;

use App\Models\Page;
use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $pages;
    public $projects;
    public function __construct()
    {
        $this->pages = Page::where('slug','projects')->first()->childe;
        $this->projects = Project::where('status','Active')->get();
          if (is_null($this->pages) || is_null($this->projects)) {
            abort(404);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.projects.sidebar');
    }
}
