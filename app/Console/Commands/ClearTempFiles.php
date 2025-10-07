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
        $files = Storage::disk('public')->files('temp/surat_pengajuan');

        foreach ($files as $file) {
            $lastModified = Storage::disk('public')->lastModified($file);
            $fileAge = time() - $lastModified;

            // Hapus file yang lebih dari 1 jam
            if ($fileAge > 3600) {
                Storage::disk('public')->delete($file);
                $this->info("Deleted: {$file}");
            }

        }

        $this->info('File sementara berhasil dibersihkan.');
    }
}
