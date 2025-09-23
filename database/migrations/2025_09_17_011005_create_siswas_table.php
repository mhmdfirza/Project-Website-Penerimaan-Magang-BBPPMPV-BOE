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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nisn', 20)->unique();
            $table->string('nama');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('kelas', 50);
            $table->string('asal_sekolah');
            $table->string('agama', 50);
            $table->text('alamat_sekolah');
            $table->text('alamat_rumah');
            $table->string('no_hp', 20);
            $table->text('alamat_kos');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('foto');
            $table->enum('status', ['ditolak', 'diproses', 'diterima'])->nullable();
            $table->unsignedBigInteger('id_pembimbing_i')->nullable();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->foreign('id_pembimbing_i')->references('id_pembimbing_i')->on('pembimbing_internal')->nullOnDelete();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
