<?php

namespace App\Http\Controllers\User\Projects;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Project;
use App\Models\Slider;
use App\Models\ProgramTabs;
use App\Models\StaticTable;
use App\Models\Tabs;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProjectController extends Controller
{
    public function index($slug= null,$id=null):View
    {
        $page = Page::findOrFail(request()->page_id);
        $slider = Slider::where('page_id', $page->id)->first();
        $tabs = Tabs::where('type','project')->where('slug','!=', 'statistics')->get();
        $slug = $page->slug;
        $id = $page->id;
        $projects = Project::findOrFail(request()->project_id);
        if(isset($slug)){
            return view('user.projects.viewProjects',compact('slug','id','projects','page','tabs','slider'));

        }else abort(400, "error");
        //adadad
}

public function download($id){
        
    $file = ProgramTabs::findorfail($id);
    $dow = $file->getFirstMediaUrl('pdfFile')  ;
    $baseUrl = url('/');
    if (!empty($dow)) {
        return response()->download(str_replace($baseUrl."/", "", $dow));
    } else {
        return response()->json(['error' => 'File not found.'], 404);
    }

}

}
