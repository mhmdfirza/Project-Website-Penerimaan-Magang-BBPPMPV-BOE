<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departemen')->insert([
            ['nama_departemen' => 'KONSTRUKSI PROPERTI DAN DAN GEOMATIKA', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'MESIN', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'LISTRIK DAN ELEKTRONIKA', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'TEKNOLOGI INFORMASI', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'OTOMOTIF', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'MANAJEMEN PENDIDIKAN VOKASI', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
