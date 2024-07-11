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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experience_id')->unsigned()->nullable();
            $table->string('icon')->nullable();
            $table->text('name');
            $table->text('description')->nullable();
            $table->string('preview')->nullable();
            $table->string('code')->nullable();
            $table->boolean('is_visible')->default(true);

            $table->foreign('experience_id')->references('id')->on('experiences')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
