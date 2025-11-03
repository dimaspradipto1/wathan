{{-- resources/views/pages/siswaPtq/edit.blade.php --}}

@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Siswa TPQ</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Siswa</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <section id="basic-horizontal-layouts">
      <div class="row match-height">
        <div class="col-md-6 col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Form Siswa</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{ route('siswatpq.update', $siswa->id) }}" method="POST" class="form form-horizontal">
                  @csrf
                  @method('PUT')

                  <div class="form-body">
                    <div class="row">
                      <!-- NIK -->
                      <div class="col-md-4">
                        <label for="nik">NIK</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="number" name="nik" value="{{ old('nik', $siswa->nik) }}" class="form-control" placeholder="NIK Siswa">
                      </div>

                      <!-- Nama -->
                      <div class="col-md-4">
                        <label for="nama">Nama</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="form-control" placeholder="Nama Siswa">
                      </div>

                      <!-- Tempat Lahir -->
                      <div class="col-md-4">
                        <label for="tempat_lahir">Tempat Lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}" class="form-control" placeholder="Tempat Lahir">
                      </div>

                      <!-- Tanggal Lahir -->
                      <div class="col-md-4">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $siswa->tgl_lahir) }}" class="form-control" placeholder="Tanggal Lahir">
                      </div>

                      <!-- Sekolah -->
                      <div class="col-md-4">
                        <label for="sekolah">Sekolah</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" name="sekolah" value="{{ old('sekolah', $siswa->sekolah) }}" class="form-control" placeholder="Sekolah">
                      </div>

                      <!-- Kegiatan Pondok -->
                      <div class="col-md-4">
                        <label for="kegiatan_pondok">Kegiatan Pondok</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select name="kegiatan_pondok" class="form-control">
                          <option value="{{ $siswa->kegiatan_pondok }}">{{ $siswa->kegiatan_pondok }}</option>
                          <option value="PTQ (Tahfiz Quran)" {{ old('kegiatan_pondok') == 'PTQ (Tahfiz Quran)' ? 'selected' : '' }}>PTQ (Tahfiz Quran)</option>
                          <option value="TPQ (Taman Pendidikan Quran)" {{ old('kegiatan_pondok') == 'TPQ (Taman Pendidikan Quran)' ? 'selected' : '' }}>TPQ (Taman Pendidikan Quran)</option>
                          <option value="PTQ dan TPQ" {{ old('kegiatan_pondok') == 'PTQ dan TPQ' ? 'selected' : '' }}>PTQ dan TPQ</option>
                        </select>
                      </div>

                      <!-- Kegiatan Tambahan -->
                      <div class="col-md-4">
                        <label for="kegiatan_tambahan">Kegiatan Tambahan</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <select name="kegiatan_tambahan" class="form-control">
                          <option value="{{ $siswa->kegiatan_tambahan }}">{{ $siswa->kegiatan_tambahan }}</option>
                          <option value="Team Hadoh" {{ old('kegiatan_tambahan') == 'Team Hadoh' ? 'selected' : '' }}>Team Hadoh</option>
                          <option value="Tilawah Al-Quran" {{ old('kegiatan_tambahan') == 'Tilawah Al-Quran' ? 'selected' : '' }}>Tilawah Al-Quran</option>
                          <option value="Kursus Bhasa Asing" {{ old('kegiatan_tambahan') == 'Kursus Bhasa Asing' ? 'selected' : '' }}>Kursus Bhasa Asing</option>
                        </select>
                      </div>

                      <!-- Alamat -->
                      <div class="col-md-4">
                        <label for="alamat">Alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <textarea name="alamat" class="form-control" cols="30" rows="5">{{ old('alamat', $siswa->alamat) }}</textarea>
                      </div>

                      <!-- Submit Button -->
                      <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1 mb-1 text-uppercase">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection
```
