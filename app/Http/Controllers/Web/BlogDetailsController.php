<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogDetailsController extends Controller
{
    public function __invoke($id)
    {
        $blog = Blog::with('categories')->findOrFail($id);
        return view('user.blogs.details', \compact('blog'));
    }
}
