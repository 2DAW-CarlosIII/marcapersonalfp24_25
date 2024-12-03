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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre', 32);
            $table->string('Apellido', 32);
            $table->string('Direccion', 32);
            $table->integer('Votos');
            $table->boolean('Confirmados')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
        $table->drop.Column('id');
        $table->drop.Column('Nombre');
        $table->drop.Column('Apellido');
        $table->drop.Column('Direccion');
        $table->drop.Column('Votos');
        $table->drop.Column('Confirmados');

    }
};
