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
            $table->increments('id_pembimbing_e');
            $table->string('nama_pembimbing_e', 255);
            $table->char('npsn_sekolah', 11);
            $table->string('no_hp', 20);
            $table->string('email', 100);

            $table->foreign('npsn_sekolah')->references('npsn')->on('sekolah_smk');
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
