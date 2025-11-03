<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'sekolah',
        'alamat',
        'kegiatan_pondok',
        'kegiatan_tambahan'
    ];


    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }
}
