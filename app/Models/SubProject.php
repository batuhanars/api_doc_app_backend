<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class SubProject extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ["project_id", "title", "slug", "logo"];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
