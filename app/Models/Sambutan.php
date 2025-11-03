<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sambutan extends Model
{
    use HasFactory;
    protected $fillable =[
        'image',
        'deskripsi1',
        'deskripsi2',
        'deskripsi3',
        'deskripsi4',
        'deskripsi5',
        'deskripsi6',
        'deskripsi7',
        'deskripsi8',
        'deskripsi9',
        'deskripsi10',
        'nama_pemilik',
        'jabatan'
    ];
}
