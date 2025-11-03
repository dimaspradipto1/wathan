<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visimisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'visi',
        'misi1',
        'misi2',
        'misi3',
        'misi4',
        'misi5'
    ];
}
