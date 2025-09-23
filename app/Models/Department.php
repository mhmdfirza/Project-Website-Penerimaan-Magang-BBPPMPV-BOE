<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments'; 
    protected $primaryKey = 'id_departemen';
    protected $fillable = ['nama_departemen'];

    public function proglis()
    {
        return $this->hasMany(Progli::class, 'id_departemen');
    }
}
