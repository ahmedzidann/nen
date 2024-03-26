<?php
namespace App\Actions\AboutTabs;
use App\Helper\ImageHelper;
use App\Models\AboutTabs;

class StoreAboutTabsAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $AboutTabs = AboutTabs::create($data);
        $this->StoreImage($data,$AboutTabs,'AboutTabs');
        return $AboutTabs;
    }
}



