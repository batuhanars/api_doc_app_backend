<?php

use App\Http\Controllers\EndpointController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ParameterController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SubProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/projects", [ProjectController::class, "index"]);
Route::post("/projects", [ProjectController::class, "store"]);
Route::get("/projects/{project}", [ProjectController::class, "show"]);
Route::put("/projects/{project}", [ProjectController::class, "update"]);
Route::delete("/projects/{project}", [ProjectController::class, "destroy"]);

Route::get("{project}/sub-projects", [SubProjectController::class, "index"]);
Route::post("{project}/sub-projects", [SubProjectController::class, "store"]);
Route::get("/sub-projects/{sub_project}", [SubProjectController::class, "show"]);
Route::put("/sub-projects/{sub_project}", [SubProjectController::class, "update"]);
Route::delete("/sub-projects/{sub_project}", [SubProjectController::class, "destroy"]);

Route::get("{sub_project}/modules", [ModuleController::class, "index"]);
Route::post("{sub_project}/modules", [ModuleController::class, "store"]);
Route::get("/modules/{module}", [ModuleController::class, "show"]);
Route::put("/modules/{module}", [ModuleController::class, "update"]);
Route::put("/modules/{module}/move", [ModuleController::class, "moveModule"]);
Route::put("/modules/{module}/endpoint-update", [ModuleController::class, "updateEndpoint"]);
Route::put("/modules/{module}/endpoint-update-title", [ModuleController::class, "updateEndpointTitle"]);
Route::put("/modules/{module}/endpoint-update-content", [ModuleController::class, "updateEndpointContent"]);
Route::delete("/modules/{module}", [ModuleController::class, "destroy"]);

Route::get("{module}/parameters", [ParameterController::class, "index"]);
Route::post("{module}/parameters", [ParameterController::class, "store"]);
Route::put("/parameters/{parameter}", [ParameterController::class, "update"]);
Route::delete("/parameters/{parameter}", [ParameterController::class, "destroy"]);
