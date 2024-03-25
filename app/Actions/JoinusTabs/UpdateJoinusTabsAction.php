<?php
namespace App\Actions\JoinusTabs;
use App\Helper\ImageHelper;
use App\Models\JoinusTabs;

class UpdateJoinusTabsAction
{
    use ImageHelper;
    public function handle(JoinusTabs $JoinusTabs,$data)
    {
        $JoinusTabs->update($data);
        $this->UpdateImage($data,$JoinusTabs,'JoinusTabs');
        return $JoinusTabs;
    }
}
