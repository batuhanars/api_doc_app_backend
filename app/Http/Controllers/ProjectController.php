<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ProjectResource::collection(Project::orderBy("created_at", "DESC")->get());
        return response(["projects" => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile("logo")) {
            $fileName = uniqid() . "." . $request->logo->extension();
            $fileNameWithUpload = "/upload/projects/" . $fileName;
            $request->logo->move(public_path("/upload/projects"), $fileName);
            $request->merge([
                "logo" => $fileNameWithUpload,
            ]);
        }
        Project::create($request->post());
        return response(["success" => "Proje başarıyla kaydedildi."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response(["project" => new ProjectResource($project)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if ($request->hasFile("logo")) {
            @unlink(public_path($project->logo));
            $fileName = uniqid() . "." . $request->logo->extension();
            $fileNameWithUpload = "/upload/projects/" . $fileName;
            $request->logo->move(public_path("/upload/projects"), $fileName);
            $request->merge([
                "logo" => $fileNameWithUpload,
            ]);
        }
        $project->update($request->post());
        return response(["success" => "Proje başarıyla güncellendi."]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response(["success" => "Proje başarıyla silindi."]);
    }
}
