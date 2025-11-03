<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusPondok extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jabatan',
        'pendidikan',
        'pekerjaan',
        'alamat',
        'nohp'
    ];
}
