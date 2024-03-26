<?php
namespace App\Actions\Project;
use App\Helper\ImageHelper;
use App\Models\Project;

class StoreProjectAction
{
    use ImageHelper;
    public function handle(array $data)
    {
        $Project = Project::create($data);
        $this->StoreImage($data,$Project,'Project');
        return $Project;
    }
}



