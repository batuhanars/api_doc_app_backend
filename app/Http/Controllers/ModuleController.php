<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleResource;
use App\Models\Module;
use App\Models\SubProject;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubProject $sub_project)
    {
        $modules = ModuleResource::collection($sub_project->modules()->orderBy("created_at", "DESC")->get());
        return response(["modules" => $modules]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SubProject $sub_project)
    {
        if (substr($request->title, -1) == "/") {
            $request->merge([
                "title" => rtrim($request->title, "/"),
                "is_dropdown" => 1
            ]);
        } else {
            $request->merge([
                "title" => rtrim($request->title, "/"),
                "is_dropdown" => 0
            ]);
        }
        $sub_project->modules()->create($request->post());
        return response(["success" => "Başarıyla mdoül eklendi."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return response(["module" => new ModuleResource($module)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $module->update($request->post());
        return response(["success" => "Modül başarıyla güncellendi."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return response(["success" => "Modül başarıyla silindi."]);
    }
}
