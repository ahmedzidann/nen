<?php
namespace App\Actions\Item;

use App\Helper\ImageHelper;
use App\Models\Item;
use App\Models\Page;
use Illuminate\Support\Arr;
class StoreItemAction
{
    use ImageHelper;
    public function handle(array $data): Item
    {
        $pages_id = Page::where('slug',$data['page_name']??'')->first();
        $item = Item::create((Arr::except($data+['pages_id'=>$pages_id->id??''], 'image','page_name')));
        $this->StoreImage($data,$item,'Item');
        $this->StoreImage2($data,$item,'bannerItem');
        
        return $item;
    }
}



