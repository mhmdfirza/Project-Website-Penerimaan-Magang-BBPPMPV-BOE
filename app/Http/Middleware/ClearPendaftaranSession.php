<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClearPendaftaranSession
{
    public function handle(Request $request, Closure $next)
    {
        $pendaftaran = session('pendaftaran');
        $routeName = $request->route()->getName();

        // Jika session korup → hapus semua
        if (session()->has('pendaftaran_in_progress') && empty($pendaftaran)) {
            session()->forget('pendaftaran_in_progress');
            session()->forget('pendaftaran');
        }

        // Jalur pendaftaran yang valid
        $allowedRoutes = [
            'pendaftaran.form',
            'pendaftaran.store',
            'pendaftaran.uploadSurat',

            'pembimbing.form',
            'pembimbing.store',

            'siswa.form',
            'siswa.store',
            'siswa.uploadFotoSiswa',

            'pendaftaran.cancel',
            'pendaftaran.selesai',
        ];

        // Jika keluar jalur
        if (
            session()->has('pendaftaran_in_progress') &&
            !in_array($routeName, $allowedRoutes)
        ) {
            // Hapus surat
            if (!empty($pendaftaran['surat_pengajuan'])) {
                Storage::disk('local')->delete($pendaftaran['surat_pengajuan']);
            }

            // Hapus foto siswa
            if (!empty($pendaftaran['siswa'])) {
                foreach ($pendaftaran['siswa'] as $data) {
                    if (!empty($data['foto_temp'])) {
                        Storage::disk('local')->delete($data['foto_temp']);
                    }
                }
            }


            // Reset session
            session()->forget('pendaftaran_in_progress');
            session()->forget('pendaftaran');
        }

        return $next($request);
    }
}
