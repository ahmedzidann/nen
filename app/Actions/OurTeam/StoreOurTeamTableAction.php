<?php
namespace App\Actions\OurTeam;
use App\Helper\ImageHelper;
use App\Models\OurTeam;
class StoreOurTeamTableAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $OurTeam = OurTeam::create($data);
        $this->StoreImage($data,$OurTeam,'OurTeam');
        return $OurTeam;
    }
}



