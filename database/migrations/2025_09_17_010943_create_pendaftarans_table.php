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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->increments('id_pendaftaran');
            $table->char('npsn_sekolah', 11);
            $table->Integer('jumlah_siswa');
            $table->unsignedInteger('id_pembimbing_e');
            $table->unsignedInteger('id_departemen');
            $table->unsignedInteger('id_progli');
            $table->string('surat_pengajuan')->nullable();
            $table->date('tgl_pengajuan');
            $table->enum('status', ['ditolak', 'diproses', 'diterima'])->nullable();

            $table->foreign('npsn_sekolah')->references('npsn')->on('sekolah_smk')->cascadeOnDelete();
            $table->foreign('id_pembimbing_e')->references('id_pembimbing_e')->on('pembimbing_eksternal')->cascadeOnDelete();
            $table->foreign('id_departemen')->references('id_departemen')->on('departemen')->cascadeOnDelete();
            $table->foreign('id_progli')->references('id_progli')->on('progli')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
