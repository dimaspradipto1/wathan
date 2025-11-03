<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Fasilita;
use Illuminate\Http\Request;
use App\Models\PengurusPondok;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pengurusPondok = PengurusPondok::count();
        $guru = Guru::count();
        $user = User::count();
        $fasilita = Fasilita::count();
        return view('layouts.dashboard.index', compact([
            'pengurusPondok',
            'guru',
            'user',
            'fasilita'
        ]));
    }
}
