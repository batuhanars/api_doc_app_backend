<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Module $module)
    {
        $parameters = $module->parameters()->orderBy("created_at", "DESC")->get();
        return response(["parameters" => $parameters]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Module $module)
    {
        $request->validate([
            "title" => "required",
            "type" => "required",
            "status" => "required",
            "description" => "required",
        ], [
            "title.required" => "Başlık gereklidir.",
            "type.required" => "Tip gereklidir.",
            "status.required" => "Durum gereklidir.",
            "description.required" => "Açıklama gereklidir.",
        ]);

        $parameter = $module->parameters()->create($request->post());
        return response(["success" => "Parametre başarıyla eklendi.", "parameter" => $parameter]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parameter $parameter)
    {
        $request->validate([
            "title" => "required",
            "type" => "required",
            "status" => "required",
            "description" => "required",
        ], [
            "title.required" => "Başlık gereklidir.",
            "type.required" => "Tip gereklidir.",
            "status.required" => "Durum gereklidir.",
            "description.required" => "Açıklama gereklidir.",
        ]);

        $parameter->update($request->post());
        return response(["success" => "Parametre başarıyla güncellendi.", "parameter" => $parameter]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parameter $parameter)
    {
        $parameter->delete();
        return response(["success" => "Parametre başarıyla silindi!"]);
    }
}
