<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingEksternal extends Model
{
    use HasFactory;

    protected $table = 'pembimbing_eksternal';
    protected $primaryKey = 'id_pembimbing_e';
    protected $fillable = ['nama_pembimbing_e', 'sekolah', 'no_hp', 'email'];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_pembimbing_e', 'id_pembimbing_e');
    }
}
