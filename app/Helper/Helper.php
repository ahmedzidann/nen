<?php
namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\View\View;

trait Helper
{
    public function StoreImage($image, $path)
    {
        if (!empty($image)) {
            $imagename = time().'-'.str_replace(' ','_',$image->getClientOriginalName());
            $image->move(storage_path($path), $imagename);
            return $imagename;
        }
    }
    public function UpdateImage($oldData,$image, $path)
    {
        $oldImage = storage_path($path.$oldData);
        if (File::exists($oldImage)) {
            unlink($oldImage);
        }

        if (!empty($image)) {
            $imagename = time().'-'.str_replace(' ','_',$image->getClientOriginalName());
            $image->move(storage_path($path), $imagename);
            return $imagename;
        }
    }

    public function DeleteImage($data, $path)
    {
        $image = storage_path($path.$data);
        if (File::exists($image)) {
            unlink($image);
        }
    }
}