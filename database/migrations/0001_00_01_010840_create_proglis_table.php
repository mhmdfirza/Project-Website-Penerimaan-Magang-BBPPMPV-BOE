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
        Schema::create('progli', function (Blueprint $table) {
            $table->increments('id_progli');
            $table->unsignedInteger('id_departemen');
            $table->string('nama_progli', 255);
            $table->foreign('id_departemen')->references('id_departemen')->on('department')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progli');
    }
};
