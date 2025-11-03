<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiPtqTpq extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'tanggal',
        'surat_id',
        'ayat',
        'nilai',
        'tugas'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
