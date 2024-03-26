<?php
namespace App\Actions\AboutTabs;
use App\Helper\ImageHelper;
use App\Models\AboutTabs;
class UpdateAboutTabsAction
{
    use ImageHelper;
    public function handle(AboutTabs $AboutTabs,$data)
    {
        $AboutTabs->update($data);
        $this->UpdateImage($data,$AboutTabs,'AboutTabs');
        return $AboutTabs;
    }
}
