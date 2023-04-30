<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Module extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ["sub_project_id", "parent_id", "title", "icon", "slug", "is_dropdown"];

    public function subModules()
    {
        return $this->hasMany(static::class, "parent_id");
    }

    public function subProject()
    {
        return $this->belongsTo(SubProject::class);
    }

    public function endpoint()
    {
        return $this->hasOne(Endpoint::class);
    }

    public function parameters()
    {
        return $this->hasMany(Parameter::class);
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
