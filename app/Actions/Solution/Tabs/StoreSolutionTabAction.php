<?php
namespace App\Actions\Solution\Tabs;
use App\Helper\ImageHelper;
use App\Models\AboutTabs;
use App\Models\SolutionTab;

class StoreSolutionTabAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $AboutTabs = SolutionTab::create($data);
        $this->StoreImage($data,$AboutTabs,'solutionTabs');
        return $AboutTabs;
    }
}



