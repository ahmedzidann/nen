<?php
namespace App\Actions\Pages;

use App\Models\Page;
use Illuminate\Support\Str;
class UpdatePagesAction
{
    public function handle(Page $page,$data)
    {
        if(isset($data['name']['en'])){
            $page->update($data+['slug'=>Str::slug($data['name']['en'])]);
        }else{
            $page->update($data);
        }
        return $page;
    }
}
