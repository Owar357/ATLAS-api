<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workspaces\StoreWorkspaceRequest;
use App\Http\Requests\Workspaces\UpdateWorkspaceRequest;
use App\Http\Resources\WorkspaceResource;
use App\Services\WorkspaceService;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function __construct(private WorkspaceService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(int $userId)
    {
        $workspaces = $this->service->index($userId);

        return WorkspaceResource::collection($workspaces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkspaceRequest $request)
    {

        $workspace = $this->service->create($request->validated());

        return new WorkspaceResource($workspace);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkspaceRequest $request, string $id)
    {
        $workspace = $this->service->update((int) $id, $request->validated());

        return response()->json([
            'message' => 'Workspace actualizado correctamente',
            'data' => new WorkspaceResource($workspace)], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
