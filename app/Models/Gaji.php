<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

    protected $fillable = [
        'karyawan_id',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
        'tanggal_gaji',
        'status_pembayaran', 
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
