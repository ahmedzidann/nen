<?php
namespace App\Actions\Pages;

use App\Helper\ImageHelper;
use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StorePagesAction
{
    use ImageHelper;
    public function handle(array $data): Page
    {
        $pages = Page::create($data+['slug'=>Str::slug($data['name']['en'])]);
        $this->StoreImage($data,$pages,'icon');
        return $pages;
    }
}



