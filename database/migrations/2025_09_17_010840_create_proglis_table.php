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
        Schema::create('proglis', function (Blueprint $table) {
            $table->id('id_progli');
            $table->unsignedBigInteger('id_departemen');
            $table->string('nama_progli');
            $table->foreign('id_departemen')->references('id_departemen')->on('departments')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proglis');
    }
};
