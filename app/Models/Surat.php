<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relasi one-to-many dengan Prestasiptq
    public function prestasiptqs()
    {
        return $this->hasMany(Prestasiptq::class);
    }

    // Relasi one-to-many dengan PrestasiPtqTpq
    public function prestasiPtqTpqs()
    {
        return $this->hasMany(PrestasiPtqTpq::class);
    }

    // Relasi one-to-many dengan Prestasitpq
    public function prestasitpqs()
    {
        return $this->hasMany(Prestasitpq::class);
    }
}
