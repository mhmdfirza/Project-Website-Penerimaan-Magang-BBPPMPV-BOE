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

        // Jika sedang dalam proses pendaftaran
        if (session()->has('pendaftaran_in_progress')) {

            // Route yang diperbolehkan (bagian dari alur pendaftaran)
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

            $routeName = $request->route()->getName();

            // Jika user keluar dari jalur pendaftaran
            if (!in_array($routeName, $allowedRoutes)) {

                // Hapus surat pengajuan sementara
                if (!empty($pendaftaran['surat_pengajuan']) &&
                    Storage::disk('public')->exists($pendaftaran['surat_pengajuan'])) {
                    Storage::disk('public')->delete($pendaftaran['surat_pengajuan']);
                }

                // Hapus semua foto siswa temp
                if (!empty($pendaftaran['siswa'])) {
                    foreach ($pendaftaran['siswa'] as $data) {
                        if (!empty($data['foto_temp']) &&
                            Storage::disk('public')->exists($data['foto_temp'])) {
                            Storage::disk('public')->delete($data['foto_temp']);
                        }
                    }
                }

                // Hapus semua session
                session()->forget('pendaftaran_in_progress');
                session()->forget('pendaftaran');
            }
        }

        return $next($request);
    }
}
