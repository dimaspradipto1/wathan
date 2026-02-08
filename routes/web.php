<?php

use App\Models\gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PtqTpqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FasilitaController;
use App\Http\Controllers\LegalitaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\SambutanController;
use App\Http\Controllers\SiswaptqController;
use App\Http\Controllers\SiswatpqController;
use App\Http\Controllers\UnggulanController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoaHarianController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PrestasiptqController;
use App\Http\Controllers\PrestasitpqController;
use App\Http\Controllers\SiswaptqtpqController;
use App\Http\Controllers\PengurusPondokController;
use App\Http\Controllers\PrestasiPtqTpqController;
use App\Http\Controllers\BacaanWudhuSholatController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(LandingPageController::class)->group(function () {
    Route::get('/', 'index')->name('landingpage');
    Route::get('home-sambutan', 'homesambutan')->name('homesambutan');
    Route::get('home-visi-misi', 'homevisimisi')->name('homevisimisi');
    Route::get('home-kontak', 'homekontak')->name('homekontak');
    Route::get('home-organisasi', 'homeorganisasi')->name('homeorganisasi');
    Route::get('home-gallery', 'homegallery')->name('homegallery');
    Route::get('home-keunggulan', 'homekeunggulan')->name('homekeunggulan');
    Route::get('home-video', 'homevideo')->name('homevideo');
    Route::get('prestasi', 'prestasi')->name('prestasi');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/loginproses', 'loginproses')->name('loginproses');
    Route::get('/logout', 'logout')->name('logout');
});


Route::middleware(['auth', 'checkrole'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('visimisi', VisiMisiController::class);
    Route::resource('sambutan', SambutanController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('unggulan', UnggulanController::class);
    Route::resource('kontak', KontakController::class);
    Route::resource('hero', HeroController::class);
    Route::resource('fasilitas', FasilitaController::class);
    Route::resource('pengurus-pondok', PengurusPondokController::class);
    Route::resource('legalitas', LegalitaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('video', VideoController::class);
    Route::resource('user', UserController::class);
    Route::get('/user/{id}/update-password', [UserController::class, 'showUpdatePasswordForm'])->name('user.showUpdatePasswordForm');
    Route::put('/user/{id}/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');
    Route::resource('bacaan-wudhu-sholat', BacaanWudhuSholatController::class);
    Route::resource('doa-harian', DoaHarianController::class);
    Route::resource('siswaptq', SiswaptqController::class);
    Route::resource('siswatpq', SiswatpqController::class);
    Route::resource('siswaptqtpq', SiswaptqtpqController::class);
    Route::resource('prestasiptq', PrestasiptqController::class);
    Route::resource('prestasitpq', PrestasitpqController::class);
    Route::resource('prestasiptqtpq', PrestasiPtqTpqController::class);
    ROute::resource('surat', SuratController::class);
});

Route::get('export-guru', [GuruController::class, 'export_guru'])->name('export_guru');
Route::post('import-guru', [GuruController::class, 'import_guru'])->name('import-guru');
Route::get('export-siswa', [SiswaController::class, 'export_siswa'])->name('export_siswa');
Route::post('import-siswa', [SiswaController::class, 'import_siswa'])->name('import-siswa');
Route::get('export-pengurus-pondok', [PengurusPondokController::class, 'export_pengurus_pondok'])->name('export-pengurus-pondok');
Route::post('import-pengurus-pondok', [PengurusPondokController::class, 'import_pengurus_pondok'])->name('import-pengurus-pondok');
Route::get('export-prestasiptq', [PrestasiptqController::class, 'export_prestasiptq'])->name('export-prestasiptq');
Route::get('export-prestasitpq', [PrestasitpqController::class, 'export_prestasitpq'])->name('export-prestasitpq');
Route::get('export-prestasiptqtpq', [PrestasiPtqTpqController::class, 'export_prestasiptqtpq'])->name('export-prestasiptqtpq');
