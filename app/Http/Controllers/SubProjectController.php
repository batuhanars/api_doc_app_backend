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
    public function index($projectId)
    {
        $project = Project::find($projectId);
        $subProjects = SubProjectResource::collection($project->subProjects()->orderBy("created_at", "DESC")->get());
        return response(["subProjects" => $subProjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $projectId)
    {
        $project = Project::find($projectId);
        $project->subProjects()->create($request->post());
        return response(["success" => "Alt Proje başarıyla oluşturuldu."]);
    }

    /**
     * Display the specified resource.
     */
    public function show($projectId, $slug)
    {
        $project = Project::find($projectId);
        $subProject = new SubProjectResource($project->subProjects()->where("slug", $slug)->first());
        return response(["subProject" => $subProject]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $projectId, $id)
    {
        $project = Project::find($projectId);
        $project->subProjects()->find($id)->update($request->post());
        return response(["success" => "Alt Proje başarıyla güncellendi."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($projectId, $id)
    {
        $project = Project::find($projectId);
        $project->subProjects()->find($id)->delete();
        return response(["success" => "Alt Proje başarıyla silindi."]);
    }
}
