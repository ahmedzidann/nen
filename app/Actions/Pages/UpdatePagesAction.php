<?php
namespace App\Actions\Pages;

use App\Helper\ImageHelper;
use App\Models\Page;
use Illuminate\Support\Str;
class UpdatePagesAction
{
    use ImageHelper;
    public function handle(Page $page,$data)
    {
        if(isset($data['name']['en'])){
            $page->update($data);
        }else{
            $page->update($data);
        }
        $this->UpdateImage($data,$page,'icon');

        return $page;
    }
}
