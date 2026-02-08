<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Video;
use App\Models\Kontak;
use App\Models\Gallery;
use App\Models\Sambutan;
use App\Models\Unggulan;
use App\Models\Visimisi;
use App\Models\Organisasi;
use App\Models\Prestasiptq;
use App\Models\Prestasitpq;
use Illuminate\Http\Request;
use App\Models\PrestasiPtqTpq;

class LandingPageController extends Controller
{
    public function index()
    {
        $hero = Hero::all();
        $kontak = Kontak::first();
        $sambutan = Sambutan::first() ?? new Sambutan(); // Prevent null value by providing empty Sambutan model
        $galleries = Gallery::all();
        $unggulan = Unggulan::all();
        $video = Video::all();
        return view('layouts.landingpage.index', compact('kontak', 'hero', 'sambutan', 'galleries', 'unggulan', 'video'));
    }

    public function homesambutan()
    {
        $sambutan = Sambutan::first() ?? new Sambutan();
        $kontak = Kontak::first() ?? new Kontak();
        return view('layouts.landingpage.sambutan', compact('kontak', 'sambutan'));
    }

    public function homevisimisi(Request $request)
    {
        $visimisi = Visimisi::first() ?? new Visimisi();
        return view('layouts.landingpage.visimisi', compact('visimisi'));
    }

    public function homekontak(Request $request)
    {
        $kontak = Kontak::first() ?? new Kontak();
        return view('layouts.landingpage.kontak', compact('kontak'));
    }

    public function homeorganisasi()
    {
        $organisasi = Organisasi::first() ?? new Organisasi();
        return view('layouts.landingpage.organisasi', compact('organisasi'));
    }

    public function homegallery(Request $request)
    {
        $galleries = Gallery::all();
        return view('layouts.landingpage.gallery', compact('galleries'));
    }

    public function homekeunggulan()
    {
        $unggulan = Unggulan::all();
        return view('layouts.landingpage.keunggulan', compact('unggulan'));
    }

    public function homevideo(Request $request)
    {
        $video = Video::all();
        return view('layouts.landingpage.video', compact('video'));
    }

    public function prestasi()
    {
        // Mengambil data dari masing-masing model
        $prestasiptq = Prestasiptq::all();
        $prestasitpq = Prestasitpq::all();
        $prestasiptqtpq = PrestasiPtqTpq::all();

        // Menggabungkan data dari ketiga model
        $data = $prestasiptq->merge($prestasitpq)->merge($prestasiptqtpq);

        // Mengirim data ke view
        return view('layouts.landingpage.prestasi', compact('data'));
    }
}
