<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\MediaCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __invoke()
    {
        $categories = MediaCategory::with('blogs')->latest()->get();
        $advertisements = Advertisement::latest()->get();
        return view('user.blogs.index', compact('categories', 'advertisements'));
    }       
}
