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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->unsignedBigInteger('report_type_id')->comment("catalogo de tipo de reporte");
            $table->foreign('report_type_id')->references('id')->on('report_types');
            $table->unsignedBigInteger('category_type_id')->comment("catalogo tipo de categoria");
            $table->foreign('category_type_id')->references('id')->on('category_types');
            $table->unsignedBigInteger('user_id')->comment("catalogo de usuarios");
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('asigned_user_id')->comment("catalogo de usuarios haciendo referencia al usuario al que se le asigno ticket");
            $table->foreign('asigned_user_id')->references('id')->on('users');
            $table->unsignedBigInteger('project_id')->comment("catalogo proyectos");
            $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('priority_type_id')->comment("catalogo de tipos de prioridad");
            $table->foreign('priority_type_id')->references('id')->on('priority_types');
            $table->unsignedBigInteger('status_id')->comment("catalogo de estatus");
            $table->foreign('status_id')->references('id')->on('statuses');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
