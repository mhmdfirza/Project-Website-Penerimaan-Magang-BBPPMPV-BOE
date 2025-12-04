<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgliSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('progli')->insert([
            ['id_departemen' => 4, 'nama_progli' => 'Rekayasa Perangkat Lunak', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 4, 'nama_progli' => 'Teknik Komputer dan Jaringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 2, 'nama_progli' => 'Teknik Listrik', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 3, 'nama_progli' => 'Teknik Otomotif', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Konstruksi dan Perawatan Bangunan Sipil', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Teknik Konstruksi dan Perumahan', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Desain Permodelan dan Informasi Bangunan', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Teknik Geomatika', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Informasi Geospasial', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Geologi Pertambangan', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 2, 'nama_progli' => 'Teknik Mekanik Industri', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 2, 'nama_progli' => 'Teknik Pengecoran Logam', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 2, 'nama_progli' => 'Teknik Gambar Mesin', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 2, 'nama_progli' => 'Teknik Permesinan Kapal', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 3, 'nama_progli' => 'Teknik Elektronika Industri', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 3, 'nama_progli' => 'Teknik Elektronika Komunikasi', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 3, 'nama_progli' => 'Teknik Mekatronika', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 3, 'nama_progli' => 'Instrumentasi Medik', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 5, 'nama_progli' => 'Teknik Kendaraan Ringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 5, 'nama_progli' => 'Teknik Sepeda Motor', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 5, 'nama_progli' => 'Teknik Alat Berat', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 5, 'nama_progli' => 'Teknik Ototronik', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 5, 'nama_progli' => 'Teknik Bodi Kendaraan Ringan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}