<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progli extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_progli';
    protected $fillable = ['id_departemen', 'nama_progli'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'id_departemen');
    }
}
