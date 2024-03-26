<?php
namespace App\Actions\OurTeam;
use App\Helper\ImageHelper;
use App\Models\OurTeam;
class UpdateOurTeamTableAction
{
    use ImageHelper;
    public function handle(OurTeam $OurTeam,$data)
    {
        $OurTeam->update($data);
        $this->UpdateImage($data,$OurTeam,'OurTeam');
        return $OurTeam;
    }
}
