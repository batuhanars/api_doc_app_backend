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
        $modules = ModuleResource::collection($sub_project->modules()->orderBy("order")->where("parent_id", 0)->get());
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
        $module = $sub_project->modules()->create($request->post());
        if ($module->is_dropdown == 0) {
            $module->endpoint()->create([
                "title" => $module->title,
                "url" => "https://domain.com/api/$module->slug",
                "method" => "GET",
                "result_content" => json_encode(array(
                    "status" => "success",
                    "message" => "Mesaj",
                    "data" => []
                )),
            ]);
        }
        return response(["success" => "Başarıyla modül eklendi.", "module" => $module]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return response(["module" => new ModuleResource($module), "endpoint" => $module->endpoint]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $module->update($request->post());
        return response(["success" => "Modül başarıyla güncellendi.", "module" => $module]);
    }

    public function moveModule(Request $request, Module $module)
    {
        $module->update([
            "order" => $request->order
        ]);
        return response(["success" => "Modül başarıyla güncellendi.", "module" => $module]);
    }

    public function updateEndpoint(Request $request, Module $module)
    {
        $module->endpoint()->update([
            "url" => $request->url,
            "method" => $request->method,
        ]);
        return response(["success" => "Endpoint başarıyla güncellendi.", "module" => $module, "endpoint" => $module->endpoint]);
    }

    public function updateEndpointTitle(Request $request, Module $module)
    {
        $module->endpoint()->update([
            "title" => $request->title,
        ]);
        return response(["success" => "Başlık başarıyla güncellendi.", "endpoint" => $module->endpoint]);
    }

    public function updateEndpointContent(Request $request, Module $module)
    {
        $module->endpoint()->update([
            "result_content" => $request->result_content,
        ]);
        return response(["success" => "Response başarıyla güncellendi.", "endpoint" => $module->endpoint]);
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
