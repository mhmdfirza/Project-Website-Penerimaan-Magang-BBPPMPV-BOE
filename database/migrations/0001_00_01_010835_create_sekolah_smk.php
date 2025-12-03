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
     Schema::create('sekolah_smk', function (Blueprint $table) {
            $table->char('id_sekolah', 36)->unique();
            $table->string('nama', 100);
            $table->char('nss', 25)->unique();
            $table->char('npsn', 11)->primary();
            $table->string('alamat_jalan', 150);
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('nama_dusun', 60);
            $table->string('nama_kelurahan', 60);
            $table->integer('id_xkota'); 
            $table->string('nama_kabupaten_kota', 64);
            $table->string('nama_provinsi', 64);
            $table->string('nama_kecamatan', 128);
            $table->timestamps();
        });
    }
   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah_smk');
    }
};
