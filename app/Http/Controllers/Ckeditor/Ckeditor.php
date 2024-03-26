<?php
namespace App\Http\Controllers\Ckeditor;


use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class Ckeditor extends Controller
{
    public function uploadImage(Request $request)
    {
        if($request->has('upload'))
        {
            $url = $request->file('upload')->store('images','public');
        }

        $url = 'storage/'.$url ;
        $CKEditorFuncNum = $request->CKEditorFuncNum;
        Image::create(['image'=>$url]);
        $message = '';
        $url = asset($url);
        echo "<script type='text/javascript'> window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum,'$url','$message'); </script> ";
    }
}
