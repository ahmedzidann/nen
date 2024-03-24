<?php
namespace App\Actions\HelpTabs;
use App\Helper\ImageHelper;
use App\Models\HelpTabs;
class UpdateHelpTabsAction
{
    use ImageHelper;
    public function handle(HelpTabs $HelpTabs,$data)
    {
        $HelpTabs->update($data);
        $this->UpdateImage($data,$HelpTabs,'HelpTabs');
        return $HelpTabs;
    }
}
