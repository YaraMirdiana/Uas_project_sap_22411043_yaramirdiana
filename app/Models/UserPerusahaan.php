<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'user_perusahaan';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'status',
    ];

    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
