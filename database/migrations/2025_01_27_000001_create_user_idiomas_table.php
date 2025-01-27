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
        Schema::create('user_idiomas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')
                ->nullable();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('idioma_id')
            ->nullable();
            $table->foreign('idioma_id')
            ->references('id')->on('idiomas')
            ->onDelete('cascade');
            $table->string('nivel');
            $table->boolean('certificado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_idiomas');
    }
};
