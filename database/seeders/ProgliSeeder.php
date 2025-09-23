<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgliSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('proglis')->insert([
            ['id_departemen' => 1, 'nama_progli' => 'Rekayasa Perangkat Lunak', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 1, 'nama_progli' => 'Teknik Komputer dan Jaringan', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 2, 'nama_progli' => 'Teknik Listrik', 'created_at' => now(), 'updated_at' => now()],
            ['id_departemen' => 3, 'nama_progli' => 'Teknik Otomotif', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
