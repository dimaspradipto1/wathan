<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilita extends Model
{
    use HasFactory;
    protected $fillable =[
        'judul',
        'subjudul',
       'deskripsi1',
       'deskripsi2',
       'deskripsi3'
    ];

}
