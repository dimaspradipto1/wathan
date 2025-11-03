<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'pendidikan',
        'pekerjaan',
        'alamat',
        'tmt'
    ];
}
