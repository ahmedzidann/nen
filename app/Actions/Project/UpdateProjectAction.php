<?php
namespace App\Actions\Project;
use App\Helper\ImageHelper;
use App\Models\Project;
class UpdateProjectAction
{
    use ImageHelper;
    public function handle(Project $project,$data)
    {
        $project->update($data);
        $this->UpdateImage($data,$project,'Project');
        return $project;
    }
}
