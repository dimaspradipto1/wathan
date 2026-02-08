<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Fasilita;
use Illuminate\Http\Request;
use App\Models\PengurusPondok;

use App\Models\Prestasiptq;
use App\Models\Prestasitpq;
use App\Models\PrestasiPtqTpq;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $pengurusPondok = PengurusPondok::count();
        $guru = Guru::count();
        $user = User::count();
        $fasilita = Fasilita::count();

        // Get monthly achievements count for current year
        $year = Carbon::now()->year;
        $monthlyData = [];

        for ($i = 1; $i <= 12; $i++) {
            $countPtq = Prestasiptq::whereYear('tanggal', $year)->whereMonth('tanggal', $i)->count();
            $countTpq = Prestasitpq::whereYear('tanggal', $year)->whereMonth('tanggal', $i)->count();
            $countPtqTpq = PrestasiPtqTpq::whereYear('tanggal', $year)->whereMonth('tanggal', $i)->count();

            $monthlyData[] = $countPtq + $countTpq + $countPtqTpq;
        }

        return view('layouts.dashboard.index', compact([
            'pengurusPondok',
            'guru',
            'user',
            'fasilita',
            'monthlyData'
        ]));
    }
}
