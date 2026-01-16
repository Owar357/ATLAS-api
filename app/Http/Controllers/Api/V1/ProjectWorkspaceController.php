<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectWorkspaceResource;
use App\Models\Project;
use App\Models\Workspace;
use App\Services\ProjectWorkspaceService;

class ProjectWorkspaceController extends Controller
{
    public function __construct(private ProjectWorkspaceService $service) {}

    public function attach(Project $project, Workspace $workspace)
    {
        $project = $this->service->attach($project, $workspace);

        return response()->json([
            'message' => 'Project assigned to workspace successfully',
            'data' => new ProjectWorkspaceResource($project),
        ], 200);
    }

    public function detach(Project $project, Workspace $workspace) 
    {
        $project = $this->service->detach($project , $workspace);

        return response()->json([
            'message' => 'Project detached from workspace successfully',
            'data' => new ProjectWorkspaceResource($project)
        ], 200);
    }
}
