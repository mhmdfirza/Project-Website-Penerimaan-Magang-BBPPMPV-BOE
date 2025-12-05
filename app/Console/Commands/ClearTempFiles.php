<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearTempFiles extends Command
{
    protected $signature = 'temp:clear';
    protected $description = 'Hapus file sementara dari folder temp';

    public function handle()
    {
        $files = Storage::disk('local')->files('temp/surat_pengajuan');

        foreach ($files as $file) {
            $lastModified = Storage::disk('local')->lastModified($file);
            $fileAge = time() - $lastModified;

            // Hapus file yang lebih dari 1 jam
            if ($fileAge > 3600) {
                Storage::disk('local')->delete($file);
                $this->info("Deleted: {$file}");
            }
        }

        $files = Storage::disk('local')->files('temp/foto_siswa');

        foreach ($files as $file) {
            $lastModified = Storage::disk('local')->lastModified($file);
            $fileAge = time() - $lastModified;

            // Hapus file yang lebih dari 1 jam
            if ($fileAge > 3600) {
                Storage::disk('local')->delete($file);
                $this->info("Deleted: {$file}");
            }
        }

        $this->info('File sementara berhasil dibersihkan.');
    }
}