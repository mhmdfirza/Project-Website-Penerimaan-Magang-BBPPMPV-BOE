<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingInternal extends Model
{
    use HasFactory;

    protected $table = 'pembimbing_internal';
    protected $primaryKey = 'id_pembimbing_i';
    protected $fillable = ['nama_pembimbing_i', 'id_progli', 'kuota'];

    public function progli()
    {
        return $this->belongsTo(Progli::class, 'id_progli');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id_ref', 'id_pembimbing_i');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_pembimbing_i', 'id_pembimbing_i');
    }
}
