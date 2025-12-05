<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PrivateFileController extends Controller
{
    public function show($path)
    {


    //         dd([
    //     'path_received' => $path,
    //     'storage_root' => storage_path('app/private/'),
    //     'full_absolute_path' => storage_path('app/private/' . $path),
    //     'exists_in_storage' => Storage::disk('local')->exists($path)
    // ]);
        // cek apakah file ada di storage/app/private/{path}
        if (!Storage::disk('local')->exists($path)) {
            return response()->json(['error' => 'File tidak ditemukan'], 404);
        }

        // Ambil path absolut
        $absolutePath = storage_path('app/private/' . $path);

        // Ambil file
        $file = Storage::disk('local')->get($path);

        // Ambil MIME type otomatis via PHP
        $mime = mime_content_type($absolutePath);

        // Return file
        return response($file, 200)
            ->header('Content-Type', $mime);
    }
}
