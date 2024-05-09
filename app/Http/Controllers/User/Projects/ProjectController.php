<?php

namespace App\Http\Controllers\User\Projects;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\StaticTable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index($slug= null,$id=null):View
    {
        if(isset($slug) && isset($id)){
            return view('user.projects.viewProjects',compact('slug','id'));
       
        }else abort(400, "error");
}
    
}
