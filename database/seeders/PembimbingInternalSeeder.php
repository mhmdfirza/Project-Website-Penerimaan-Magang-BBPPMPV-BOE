<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembimbingInternalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pembimbing_internal')->insert([
            ['nama_pembimbing_i' => 'Budi Santoso', 'id_progli' => 1, 'kuota' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['nama_pembimbing_i' => 'Siti Aminah', 'id_progli' => 2, 'kuota' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['nama_pembimbing_i' => 'Agus Pratama', 'id_progli' => 3, 'kuota' => 12, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
