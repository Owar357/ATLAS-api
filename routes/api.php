<?php

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

});
