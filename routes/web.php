<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [MainController::class, "index"])->name("projects.index");
Route::get("/{project}/alt-projeler", [MainController::class, "subProjects"])->name("sub-projects.index");
Route::get("/{project}/{subProject}", [MainController::class, "panel"])->name("panel.index");
Route::get("/{project}/{subProject}/{module}", [MainController::class, "module"])->name("module.index");
Route::get("/{project}/{subProject}/{module}/{subModule}", [MainController::class, "subModule"])->name("subModule.index");
