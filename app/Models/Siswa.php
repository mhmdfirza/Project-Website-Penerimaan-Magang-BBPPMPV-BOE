<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $fillable = [
        'nisn',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'kelas',
        'asal_sekolah',
        'agama',
        'alamat_sekolah',
        'alamat_rumah',
        'no_hp',
        'alamat_kos',
        'tanggal_mulai',
        'tanggal_selesai',
        'foto',
        'status',
        'id_pembimbing_i',
        'id_pendaftaran'
    ];

    public function pembimbingInternal()
    {
        return $this->belongsTo(PembimbingInternal::class, 'id_pembimbing_i', 'id_pembimbing_i');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
