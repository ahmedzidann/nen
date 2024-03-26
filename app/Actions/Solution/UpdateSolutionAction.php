<?php
namespace App\Actions\Solution;
use App\Helper\ImageHelper;
use App\Models\Solution;

class UpdateSolutionAction
{
    use ImageHelper;
    public function handle(Solution $solution,$data)
    {
        $solution->update($data);
        $this->UpdateImage($data,$solution,'Solution');
        return $solution;
    }
}
