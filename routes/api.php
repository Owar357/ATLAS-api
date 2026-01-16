<?php

use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\ProjectWorkspaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\WorkspaceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


    Route::prefix('v1')->group(function(){
    Route::post('/workspaces', [WorkspaceController::class,'store']);
    Route::get('/users/{userId}/workspaces' ,[WorkspaceController::class,'index']);
    Route::patch('workspaces/{id}',[WorkspaceController::class,'update']);

    Route::post('workspace/projects', [ProjectController::class , 'store']);
    Route::patch('workspace/projects/{id}', [ProjectController::class, 'update']);
    Route::get('workspace/projects/{id}', [ProjectController::class, 'index']);
    Route::post('projects/{project}/workspace/{workspace}',[ProjectWorkspaceController::class, 'attach']);
    Route::delete('projects/{project}/workspace/{workspace}' , [ProjectWorkspaceController::class, 'detach']);
});
