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
Route::get("/projects/{project}", [ProjectController::class, "show"]);
Route::put("/projects/{project}", [ProjectController::class, "update"]);
Route::delete("/projects/{project}", [ProjectController::class, "destroy"]);

Route::get("{project}/sub-projects", [SubProjectController::class, "index"]);
Route::post("{project}/sub-projects", [SubProjectController::class, "store"]);
Route::get("/sub-projects/{sub_project}", [SubProjectController::class, "show"]);
Route::put("/sub-projects/{sub_project}", [SubProjectController::class, "update"]);
Route::delete("/sub-projects/{sub_project}", [SubProjectController::class, "destroy"]);
