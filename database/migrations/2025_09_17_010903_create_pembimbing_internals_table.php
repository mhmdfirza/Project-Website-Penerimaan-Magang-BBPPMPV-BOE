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
        Schema::create('pembimbing_internal', function (Blueprint $table) {
            $table->id('id_pembimbing_i');
            $table->string('nama_pembimbing_i');
            $table->unsignedBigInteger('id_progli');
            $table->integer('kuota');
            $table->foreign('id_progli')->references('id_progli')->on('proglis')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbing_internal');
    }
};
