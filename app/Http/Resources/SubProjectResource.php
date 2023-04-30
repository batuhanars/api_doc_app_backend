<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "project_id" => $this->project_id,
            "title" => $this->title,
            "slug" => $this->slug,
            "created_at" => $this->created_at->format("Y-m-d"),
            "updated_at" => $this->updated_at,
            "project" => $this->project,
        ];
    }
}
