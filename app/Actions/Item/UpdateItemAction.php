<?php
namespace App\Actions\Item;
use App\Helper\ImageHelper;
use App\Models\Item;
use App\Models\Page;
use Illuminate\Support\Arr;

class UpdateItemAction
{
    use ImageHelper;
    public function handle(Item $item,array $data): Item
    {
        $pages_id = Page::where('slug',$data['page_name']??'')->first();
        $item->update((Arr::except($data+['pages_id'=>$pages_id->id??''], 'image','page_name')));
        $this->UpdateImage($data,$item,'Item');
        $this->UpdateImage2($data,$item,'bannerItem');
        return $item;
    }
}