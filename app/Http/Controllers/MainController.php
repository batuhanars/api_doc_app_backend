<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\SubProject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $projects = Project::query()->when(request()->get("proje"), function (Builder $query, $search) {
            $query->where("title", "LIKE", "%{$search}%");
        })->orderBy("created_at", "DESC")->get();
        return view("index", compact("projects"));
    }

    public function subProjects(Project $project)
    {
        $subProjects = $project->subProjects()->when(request()->get("alt-proje"), function (Builder $query, $search) {
            $query->where("title", "LIKE", "%{$search}%");
        })->orderBy("created_at", "DESC")->get();
        return view("sub-projects", compact("project", "subProjects"));
    }

    public function panel(Project $project, SubProject $subProject)
    {
        $modules = $subProject->modules()->where("parent_id", 0)->orderBy("order")->get();
        return view("panel", compact("project", "subProject", "modules"));
    }

    public function module(Project $project, SubProject $subProject, Module $module)
    {
        $modules = $subProject->modules()->where("parent_id", 0)->orderBy("order")->get();
        $parameters = $module->parameters()->orderBy("created_at", "DESC")->get();
        return view("module", compact("project", "subProject", "module", "modules", "parameters"));
    }

    public function subModule(Project $project, SubProject $subProject, Module $module, Module $subModule)
    {
        $modules = $subProject->modules()->where("parent_id", 0)->orderBy("order")->get();
        $parameters = $subModule->parameters()->orderBy("created_at", "DESC")->get();
        return view("sub-module", compact("project", "subProject", "module", "modules", "subModule", "parameters"));
    }
}
