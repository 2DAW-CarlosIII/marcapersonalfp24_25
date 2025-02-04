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
        Schema::table('ciclos', function (Blueprint $table) {
            $table-> unsignedBigInteger('familia_id')->foreign('familia_id')->references('id')->on('familia_profesional');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ciclos', function (Blueprint $table) {
            $table->dropColumn('familia_id');
            $table->dropForeign('familia_id');
        });
    }
};
