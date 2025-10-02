<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Department;
use App\Models\Progli;
use App\Models\PembimbingEksternal;
use App\Models\Pendaftaran;
use App\Models\Siswa;

class PendaftaranController extends Controller
{
    // * Step 1: Form Pendaftaran


    // ? fungsi search sekolah
    public function searchSekolah(Request $request)
    {
        $query = $request->get('q', '');

        $sekolah = DB::table('sekolah_smk')
            ->select('npsn', 'nama')
            ->where('nama', 'like', "%{$query}%")
            ->limit(10)
            ->get();

        return response()->json($sekolah);
    }

    public function formPendaftaran()
    {
        $departemen = Department::all();
        $progli = Progli::all();
        $pendaftaran = session('pendaftaran', []);

        return view('pendaftaran.form_pendaftaran', compact('departemen', 'progli', 'pendaftaran'));
    }

    public function storePendaftaran(Request $request)
    {
        $request->validate([
            'npsn_sekolah'   => 'required',
            'id_departemen'  => 'required|exists:departemen,id_departemen',
            'id_progli'      => 'required|exists:progli,id_progli',
        ]);

        $pendaftaran = session('pendaftaran', []);
        $pendaftaran['npsn_sekolah']  = $request->npsn_sekolah;
        $pendaftaran['id_departemen'] = $request->id_departemen;
        $pendaftaran['id_progli']     = $request->id_progli;

        session(['pendaftaran' => $pendaftaran]);

        return redirect()->route('pembimbing.form');
    }

    // Step 2: Form Pembimbing
    public function formPembimbing()
    {
        $pendaftaran = session('pendaftaran', []);
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

    // Step 3: Form Siswa
    public function formSiswa()
    {
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
            'siswa' => 'required|array|min:' . $jumlah_siswa . '|max:' . $jumlah_siswa,
            'siswa.*.nisn'          => 'required',
            'siswa.*.nama'          => 'required',
            'siswa.*.tempat_lahir'  => 'required',
            'siswa.*.tanggal_lahir' => 'required|date',
            'siswa.*.kelas'         => 'required',
            'siswa.*.agama'         => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'siswa.*.foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pendaftaran['siswa'] = $request->siswa;
        session(['pendaftaran' => $pendaftaran]);

        // ✅ simpan ke DB baru di step ini
        $pembimbing = PembimbingEksternal::create([
            'nama_pembimbing_e' => $pendaftaran['pembimbing']['nama'],
            'sekolah'           => $pendaftaran['npsn_sekolah'],
            'no_hp'             => $pendaftaran['pembimbing']['no_hp'],
            'email'             => $pendaftaran['pembimbing']['email'],
        ]);

        $dbPendaftaran = Pendaftaran::create([
            'npsn_sekolah'   => $pendaftaran['npsn_sekolah'],
            'jumlah_siswa'   => $pendaftaran['pembimbing']['jumlah_siswa'],
            'id_pembimbing_e' => $pembimbing->id_pembimbing_e,
            'id_departemen'  => $pendaftaran['id_departemen'],
            'id_progli'      => $pendaftaran['id_progli'],
            'tgl_pengajuan'  => now(),
            'status'         => 'diproses',
        ]);

        foreach ($pendaftaran['siswa'] as $data) {
            $imagePath = null;

            if (isset($data['foto']) && $data['foto'] instanceof \Illuminate\Http\UploadedFile) {
                $imagePath = $data['foto']->store('foto_siswa', 'public');
            }       

            Siswa::create([
                'nisn'          => $data['nisn'],
                'nama'          => $data['nama'],
                'tempat_lahir'  => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'kelas'         => $data['kelas'],
                'asal_sekolah'  => $pendaftaran['npsn_sekolah'],
                'agama'         => $data['agama'],
                'alamat_rumah'  => $data['alamat_rumah'] ?? '',
                'no_hp'         => $data['no_hp'] ?? '',
                'alamat_kos'    => '',
                'tanggal_mulai' => now(),
                'tanggal_selesai' => now()->addMonths(3),
                'foto'          => $imagePath,
                'status'        => 'diproses',
                'id_pembimbing_i' => null,
                'id_pendaftaran' => $dbPendaftaran->id_pendaftaran,
            ]);
        }

        session()->forget('pendaftaran'); // bersihkan session

        return redirect()->route('pendaftaran.selesai');
    }

    // Step 4: Selesai
    public function selesai()
    {
        return view('pendaftaran.selesai');
    }

    // Cancel / Batal
    public function cancel()
    {
        session()->forget('pendaftaran');
        return redirect()->route('home')->with('info', 'Pendaftaran dibatalkan.');
    }
}
