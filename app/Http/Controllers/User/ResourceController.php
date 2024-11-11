<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function getResources(Request $request)
    {
        $resources = Resource::where(['main_category' => $request->main_category, 'sub_category' => $request->sub_category])->get();
        $view = view('user.layout.includes.resources', compact('resources'))->render();
        return response()->json(['status' => 'success', 'data' => $view]);
    }
}
