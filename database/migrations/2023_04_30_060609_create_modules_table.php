<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("sub_project_id");
            $table->unsignedInteger("parent_id");
            $table->string("title");
            $table->string("icon");
            $table->string("slug");
            $table->integer("is_dropdown");
            $table->timestamps();

            $table->foreign("sub_project_id")->references("id")->on("sub_projects")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
