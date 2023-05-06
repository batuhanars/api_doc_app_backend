<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubProjectResource;
use App\Models\Project;
use App\Models\SubProject;
use Illuminate\Http\Request;

class SubProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project)
    {
        $subProjects = SubProjectResource::collection($project->subProjects()->orderBy("created_at", "DESC")->get());
        return response(["subProjects" => $subProjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $request->validate([
            "title" => "required"
        ], [
            "title.required" => "Başlık gereklidir.",
        ]);

        $subProject = $project->subProjects()->create($request->post());
        return response(["success" => "Alt Proje başarıyla oluşturuldu.", "subProject" => $subProject]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubProject $sub_project)
    {
        return response(["subProject" => new SubProjectResource($sub_project)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubProject $sub_project)
    {
        $request->validate([
            "title" => "required"
        ], [
            "title.required" => "Başlık gereklidir.",
        ]);

        $sub_project->update($request->post());
        return response(["success" => "Alt Proje başarıyla güncellendi.", "subProject" => $sub_project]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubProject $sub_project)
    {
        $sub_project->delete();
        return response(["success" => "Alt Proje başarıyla silindi."]);
    }
}
