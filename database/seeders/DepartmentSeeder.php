<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([
            ['nama_departemen' => 'Teknik Informatika', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'Teknik Elektro', 'created_at' => now(), 'updated_at' => now()],
            ['nama_departemen' => 'Teknik Mesin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
