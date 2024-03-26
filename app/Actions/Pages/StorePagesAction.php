<?php
namespace App\Actions\Pages;

use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StorePagesAction
{
    public function handle(array $data): Page
    {
        $pages = Page::create($data+['slug'=>Str::slug($data['name']['en'])]);
        return $pages;
    }
}



