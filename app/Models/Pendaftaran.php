<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $fillable = [
        'npsn_sekolah',
        'jumlah_siswa',
        'id_pembimbing_e',
        'id_departemen',
        'id_progli',
        'surat_pengajuan',
        'tgl_mulai',
        'tgl_selesai',
        'status_pendaftaran'
    ];

    public function pembimbingEksternal()
    {
        return $this->belongsTo(PembimbingEksternal::class, 'id_pembimbing_e');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_departemen');
    }

    public function progli()
    {
        return $this->belongsTo(Progli::class, 'id_progli');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}
