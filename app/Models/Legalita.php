<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legalita extends Model
{
    use HasFactory;
    protected $fillable = [
        'perusahaan',
        'pimpinan',
        'notaris',
        'akta_notaris',
        'ahu_nomor',
        'skep_ppjk',
        'alamat',
        'kontak',
        'email'
    ];
}
