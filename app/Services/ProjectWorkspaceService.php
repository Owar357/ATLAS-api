<?php 

namespace App\Services;

use App\Models\Project;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class ProjectWorkspaceService
{
   
    public function  attach(Project $project , Workspace $workspace)
    {
         $project->Workspace()->associate($workspace);

         $project->save();

         return $project;
    }

    public function detach(Project $project, Workspace $workspace)
    {
       $project->Workspace()->disassociate($workspace);

       $project->save();

       return $project;
   }
}
