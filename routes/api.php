<?php

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
Route::get("/projects/{slug}", [ProjectController::class, "show"]);
Route::put("/projects/{id}", [ProjectController::class, "update"]);
Route::delete("/projects/{id}", [ProjectController::class, "destroy"]);

Route::get("{projectId}/sub-projects", [SubProjectController::class, "index"]);
Route::post("{projectId}/sub-projects", [SubProjectController::class, "store"]);
Route::get("{projectId}/sub-projects/{slug}", [SubProjectController::class, "show"]);
Route::put("{projectId}/sub-projects/{id}", [SubProjectController::class, "update"]);
Route::delete("{projectId}/sub-projects/{id}", [SubProjectController::class, "destroy"]);
