<?php

namespace App\View\Components\Frontend\Projects;

use App\Models\AboutTabs;
use App\Models\Page;
use App\Models\Project;
use App\Models\Tabs;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewProjects extends Component
{
    /**
     * Create a new component instance.
     */
    public $page;
    public $projects;
    public $about;
    public $programs;
    public $help;
    public $document;
    public $joinus;
    public $tabs;
    public function __construct($slug , $id)
    {
        $this->tabs = Tabs::get()->toArray();
        $this->page = Page::where([['slug',$slug],['status','Active']])->first();
        $this->projects =Project::where([['id',$id],['status','Active']])->first();
         if (is_null($this->projects)) {
            abort(404);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.frontend.projects.view-projects');
    }
}
