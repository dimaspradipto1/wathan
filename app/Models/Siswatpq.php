<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswatpq extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
