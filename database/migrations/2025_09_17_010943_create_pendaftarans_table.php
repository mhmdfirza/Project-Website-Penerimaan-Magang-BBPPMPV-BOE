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
            $table->id('id_pendaftaran');
            $table->string('asal_sekolah');
            $table->tinyInteger('jumlah_siswa');
            $table->unsignedBigInteger('id_pembimbing_e');
            $table->unsignedBigInteger('id_departemen');
            $table->unsignedBigInteger('id_progli');
            $table->string('surat_pengajuan')->nullable();
            $table->date('tgl_pengajuan');
            $table->string('status', 50);
            $table->foreign('id_pembimbing_e')->references('id_pembimbing_e')->on('pembimbing_eksternal')->cascadeOnDelete();
            $table->foreign('id_departemen')->references('id_departemen')->on('departments')->cascadeOnDelete();
            $table->foreign('id_progli')->references('id_progli')->on('proglis')->cascadeOnDelete();
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
