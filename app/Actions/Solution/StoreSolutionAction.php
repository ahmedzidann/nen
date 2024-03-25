<?php
namespace App\Actions\Solution;
use App\Helper\ImageHelper;
use App\Models\Solution;

class StoreSolutionAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $Solution = Solution::create($data);
        $this->StoreImage($data,$Solution,'Solution');
        return $Solution;
    }
}



