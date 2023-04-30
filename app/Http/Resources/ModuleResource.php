<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "parent_id" => $this->parent_id,
            "sub_project_id" => $this->sub_project_id,
            "title" => $this->title,
            "icon" => $this->icon,
            "slug" => $this->slug,
            "is_dropdown" => $this->is_dropdown,
            "created_at" => $this->created_at->format("Y-m-d"),
            "updated_at" => $this->updated_at,
            "subModules" => $this->subModules,
            "subProject" => $this->subProject,
            "endpoint" => $this->endpoint,
        ];
    }
}
