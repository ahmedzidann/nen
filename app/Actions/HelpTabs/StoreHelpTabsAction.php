<?php
namespace App\Actions\HelpTabs;
use App\Helper\ImageHelper;
use App\Models\HelpTabs;

class StoreHelpTabsAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $HelpTabs = HelpTabs::create($data);
        $this->StoreImage($data,$HelpTabs,'HelpTabs');
        return $HelpTabs;
    }
}



