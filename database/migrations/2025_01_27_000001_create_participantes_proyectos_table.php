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
        Schema::create('participantes_proyectos', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->foreign('estudiante_id')->references('id')->on('reconocimientos')->onDelete('cascade');
            $table->foreign('proyecto_id')->references('id')->on('proyectos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes_proyectos');
    }
};
