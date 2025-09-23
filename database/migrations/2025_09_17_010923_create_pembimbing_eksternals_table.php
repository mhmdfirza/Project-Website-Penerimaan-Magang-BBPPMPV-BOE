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
        Schema::create('pembimbing_eksternal', function (Blueprint $table) {
            $table->id('id_pembimbing_e');
            $table->string('nama_pembimbing_e');
            $table->string('sekolah');
            $table->string('no_hp', 20);
            $table->string('email', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbing_eksternal');
    }
};
