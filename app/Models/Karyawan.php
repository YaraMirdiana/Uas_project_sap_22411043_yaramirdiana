<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'jabatan',
        'alamat',
        'tanggal_masuk',
        'status',
    ];

    
    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }
}
