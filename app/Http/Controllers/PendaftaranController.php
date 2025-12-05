<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Progli;
use App\Models\PembimbingEksternal;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{

    // ? fungsi search sekolah
    public function searchSekolah(Request $request)
    {
        $query = $request->get('q', '');

        $sekolah = DB::table('sekolah_smk')
            ->select('npsn', 'nama_sekolah')
            ->where('nama_sekolah', 'like', "%{$query}%")
            ->limit(10)
            ->get();

        return response()->json($sekolah);
    }


    // ? Ambil progli berdasarkan pilihan departemen
    public function getProgli($id_departemen)
    {
        $progli = \App\Models\Progli::where('id_departemen', $id_departemen)->get();

        return response()->json($progli);
    }


    // ? Uplaod surat
    public function uploadSurat(Request $request)
    {
        try { 
            $request->validate([
                'surat_pengajuan' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048'
            ]);

            $pendaftaran = session('pendaftaran', []);

            // Simpan file sementara ke storage/app/private/temp
            $tempSuratPath = $request->file('surat_pengajuan')->store('temp/surat_pengajuan/');
            $pendaftaran['surat_pengajuan'] = $tempSuratPath;
            
            // Update session
            session(['pendaftaran' => $pendaftaran]);

            return response()->json([
                'success' => true,
                'path' => url('/api/private-temp/' . $tempSuratPath),
                'filename' => $request->file('surat_pengajuan')->getClientOriginalName(),
                'extension' => $request->file('surat_pengajuan')->getClientOriginalExtension()
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    // ? upload gambar
    public function uploadFotoSiswa(Request $request)
    {
        try {
            $request->validate([
                'foto_siswa' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'index' => 'required|integer' // parameter index untuk tahu siswa keberapa
            ]);

            $pendaftaran = session('pendaftaran', []);
            $index = $request->index;

            // Hapus foto temp sebelumnya JIKA ADA untuk siswa ini
            if (!empty($pendaftaran['siswa'][$index]['foto_temp']) && 
                Storage::disk('local')->exists($pendaftaran['siswa'][$index]['foto_temp'])) {
                Storage::disk('local')->delete($pendaftaran['siswa'][$index]['foto_temp']);
            }

            // Simpan file sementara ke storage/app/private/temp/foto_siswa
            $tempFotoPath = $request->file('foto_siswa')->store('temp/foto_siswa/');
            
            // Simpan di session dengan struktur array berdasarkan index
            if (!isset($pendaftaran['siswa'])) {
                $pendaftaran['siswa'] = []; // Pastikan array siswa ada
            }
            
            $pendaftaran['siswa'][$index] = [
                'foto_temp' => $tempFotoPath, // Simpan path temporary
                'foto_filename' => $request->file('foto_siswa')->getClientOriginalName()
            ];
            
            session(['pendaftaran' => $pendaftaran]);

            return response()->json([
                'success' => true,
                'path' => url('/api/private-temp/' . $tempFotoPath),
                'filename' => $request->file('foto_siswa')->getClientOriginalName(),
                'index' => $index // Return index untuk JavaScript
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    // * Step 1: Form Pendaftaran

    public function formPendaftaran()
    {

        if (!session()->has('pendaftaran_in_progress')) {
            session()->forget('pendaftaran');
        }

        session(['pendaftaran_in_progress' => true]); 

        $departemen = Department::all();
        $progli = Progli::all();
        $pendaftaran = session('pendaftaran', []);

        return view('pendaftaran.form_pendaftaran', compact('departemen', 'progli', 'pendaftaran'));
    }

    public function storePendaftaran(Request $request)
    {
        $pendaftaran = session('pendaftaran', []);


        $request->validate([
            'npsn_sekolah'   => 'required',
            'id_departemen'  => 'required|exists:departemen,id_departemen',
            'id_progli'      => 'required|exists:progli,id_progli',
            'tgl_mulai'      => 'required|date',
            'tgl_selesai'    => 'required|date|after_or_equal:tgl_mulai',
            'surat_pengajuan' => empty($pendaftaran['surat_pengajuan']) 
                ? 'required|file|mimes:jpeg,png,jpg,pdf|max:2048' 
                : 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);


        $pendaftaran['npsn_sekolah']  = $request->npsn_sekolah;
        $pendaftaran['asal_sekolah']  = $request->asal_sekolah; 
        $pendaftaran['id_departemen'] = $request->id_departemen;
        $pendaftaran['id_progli']     = $request->id_progli;
        $pendaftaran['tgl_mulai']     = $request->tgl_mulai;
        $pendaftaran['tgl_selesai']   = $request->tgl_selesai;

        if ($request->hasFile('surat_pengajuan')) {
            // hapus file lama jika ada
            if (!empty($pendaftaran['surat_pengajuan']) && Storage::disk('local')->exists($pendaftaran['surat_pengajuan'])) {
                Storage::disk('local')->delete($pendaftaran['surat_pengajuan']);
            }

            // Simpan
            $suratPath = $request->file('surat_pengajuan')->store('temp/surat_pengajuan', 'local');
            $pendaftaran['surat_pengajuan'] = $suratPath;
        }

        session(['pendaftaran' => $pendaftaran]);

        // dd($pendaftaran['surat_pengajuan']);

        return redirect()->route('pembimbing.form');
    }

    // * Step 2: Form Pembimbing
    public function formPembimbing()
    {
        session(['pendaftaran_in_progress' => true]); 

        $pendaftaran = session('pendaftaran', []);

        // if (isset($pendaftaran['siswa'])) {
        //     unset($pendaftaran['siswa']);
        //     session(['pendaftaran' => $pendaftaran]);
        // }

        return view('pendaftaran.form_pembimbing', compact('pendaftaran'));
    }

    public function storePembimbing(Request $request)
    {
        $request->validate([
            'nama_pembimbing' => 'required',
            'no_hp'           => 'required',
            'email'           => 'required|email',
            'jumlah_siswa'    => 'required|integer|min:1|max:50',
        ]);

        $pendaftaran = session('pendaftaran', []);
        $pendaftaran['pembimbing'] = [
            'nama'   => $request->nama_pembimbing,
            'no_hp'  => $request->no_hp,
            'email'  => $request->email,
            'jumlah_siswa' => $request->jumlah_siswa,
        ];

        session(['pendaftaran' => $pendaftaran]);

        return redirect()->route('siswa.form');
    }

    // * Step 3: Form Siswa
    public function formSiswa()
    {
        session(['pendaftaran_in_progress' => true]); 

        $pendaftaran = session('pendaftaran', []);
        if (!isset($pendaftaran['pembimbing']['jumlah_siswa'])) {
            return redirect()->route('pendaftaran.form');
        }

        $jumlah_siswa = $pendaftaran['pembimbing']['jumlah_siswa'];

        return view('pendaftaran.form_siswa', compact('pendaftaran', 'jumlah_siswa'));
    }

    public function storeSiswa(Request $request)
    {

        $pendaftaran = session('pendaftaran', []);
        $jumlah_siswa = $pendaftaran['pembimbing']['jumlah_siswa'] ?? 0;

        $request->validate([
            'siswa'                 => 'required|array|min:' . $jumlah_siswa . '|max:' . $jumlah_siswa,
            'siswa.*.nisn'          => 'required',
            'siswa.*.nama_siswa'    => 'required',
            'siswa.*.tempat_lahir'  => 'required',
            'siswa.*.tanggal_lahir' => 'required|date',
            'siswa.*.kelas'         => 'required',
            'siswa.*.agama'         => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'siswa.*.foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 2mb
        ]);



        DB::beginTransaction();

        try{

            $pendaftaran['siswa'] = $pendaftaran['siswa'] ?? [];

            // simpan ke DB baru di step ini
            $pembimbing = PembimbingEksternal::create([
                'nama_pembimbing_e' => $pendaftaran['pembimbing']['nama'],
                'npsn_sekolah'      => $pendaftaran['npsn_sekolah'],
                'no_hp'             => $pendaftaran['pembimbing']['no_hp'],
                'email'             => $pendaftaran['pembimbing']['email'],
            ]);


            // surat pengajuan temp -> main
            $suratPath = null;

            if (!empty($pendaftaran['surat_pengajuan']) && Storage::disk('local')->exists($pendaftaran['surat_pengajuan'])) {

                $originalFileName = pathinfo($pendaftaran['surat_pengajuan'], PATHINFO_BASENAME);

                $directory = 'surat_pengajuan/' . date('Y/m/d');

                // Buat folder tujuan jika belum ada
                Storage::disk('local')->makeDirectory($directory);

                $suratPath = $directory . '/' . uniqid() . '_' . $originalFileName;

                Storage::disk('local')->move(
                    $pendaftaran['surat_pengajuan'],
                    $suratPath
                );
            }


            $dbPendaftaran = Pendaftaran::create([
                'npsn_sekolah'      => $pendaftaran['npsn_sekolah'],
                'jumlah_siswa'      => $pendaftaran['pembimbing']['jumlah_siswa'],
                'id_pembimbing_e'   => $pembimbing->id_pembimbing_e,
                'id_departemen'     => $pendaftaran['id_departemen'],
                'id_progli'         => $pendaftaran['id_progli'],
                'surat_pengajuan'   => $suratPath,
                'tgl_mulai'         => $pendaftaran['tgl_mulai'],
                'tgl_selesai'       => $pendaftaran['tgl_selesai'],
                'status_pendaftaran'=> 'diproses',
            ]);

            $id_pendaftaran = $dbPendaftaran->id_pendaftaran;

            // ambil tanggal mulai & selesai dari session
            $tglMulaiDefault   = $pendaftaran['tgl_mulai'];
            $tglSelesaiDefault = $pendaftaran['tgl_selesai'];

            $uploadedFotoSiswa = [];
            foreach ($request->siswa as $index => $data) {

                $fotoPath = null;

                // Ambil dari temp AJAX
                if (!empty($pendaftaran['siswa'][$index]['foto_temp']) && 
                    Storage::disk('local')->exists($pendaftaran['siswa'][$index]['foto_temp'])) {

                    $originalFileName = pathinfo($pendaftaran['siswa'][$index]['foto_temp'], PATHINFO_BASENAME);
                    $directory = 'foto_siswa/' . date('Y/m/d');

                    Storage::disk('local')->makeDirectory($directory);

                    $fotoPath = $directory . '/' . uniqid() . '_' . $originalFileName;

                    Storage::disk('local')->move(
                        $pendaftaran['siswa'][$index]['foto_temp'],
                        $fotoPath
                    );
                }

                // Upload langsung tanpa temp
                elseif ($request->hasFile("siswa.{$index}.foto")) {
                    $fotoPath = $request->file("siswa.{$index}.foto")
                        ->store('foto_siswa/' . date('Y/m/d'), 'local');
                }

                // Simpan path untuk rollback jika error
                if ($fotoPath) {
                    $uploadedFotoSiswa[] = $fotoPath;
                }

                // cek apakah siswa punya tanggal khusus
                $tglMulaiSiswa   = $data['tgl_mulai']   ?? $tglMulaiDefault;
                $tglSelesaiSiswa = $data['tgl_selesai'] ?? $tglSelesaiDefault;

                Siswa::create([
                    'nisn'              => $data['nisn'],
                    'nama_siswa'        => $data['nama_siswa'],
                    'tempat_lahir'      => $data['tempat_lahir'],
                    'tanggal_lahir'     => $data['tanggal_lahir'],
                    'kelas'             => $data['kelas'],
                    'npsn_sekolah'      => $pendaftaran['npsn_sekolah'],
                    'agama'             => $data['agama'],
                    'alamat_rumah'      => $data['alamat_rumah'] ?? '',
                    'no_hp'             => $data['no_hp'] ?? '',
                    'alamat_kos'        => '',
                    'tgl_mulai'         => $tglMulaiSiswa,
                    'tgl_selesai'       => $tglSelesaiSiswa,
                    'foto'              => $fotoPath,
                    'status_siswa'      => 'diproses',
                    'id_pembimbing_i'   => null,
                    'id_pendaftaran'    => $id_pendaftaran,
                ]);
            }



            DB::commit();
            session(['pendaftaran' => $pendaftaran]);



            return redirect()->route('pendaftaran.selesai');

        } catch (\Exception $e) {

             // Hapus surat pengajuan
            if (!empty($suratPath) && Storage::disk('local')->exists($suratPath)) {
                Storage::disk('local')->delete($suratPath);
            }

            // Hapus semua foto siswa yang berhasil pindah
            foreach ($uploadedFotoSiswa as $path) {
                if (Storage::disk('local')->exists($path)) {
                    Storage::disk('local')->delete($path);
                }
            }

            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }

    }

    // Step 4: Selesai
    public function selesai()
    {
        session()->forget('pendaftaran_in_progress');
        session()->forget('pendaftaran'); 
        return view('pendaftaran.selesai');
    }

    // Cancel / Batal
    public function cancel()
    {
        $pendaftaran = session('pendaftaran', []);

        // Hapus temp surat
        if (!empty($pendaftaran['surat_pengajuan']) && Storage::disk('local')->exists($pendaftaran['surat_pengajuan'])) {
            Storage::disk('local')->delete($pendaftaran['surat_pengajuan']);
        }

        // Hapus foto temp siswa
        if (!empty($pendaftaran['siswa'])) {
            foreach ($pendaftaran['siswa'] as $siswa) {
                if (!empty($siswa['foto_temp']) && Storage::disk('local')->exists($siswa['foto_temp'])) {
                    Storage::disk('local')->delete($siswa['foto_temp']);
                }
            }
        }

        session()->forget(['pendaftaran_in_progress', 'pendaftaran']);

        return redirect()->route('home')->with('info', 'Pendaftaran dibatalkan.');
    }

}
