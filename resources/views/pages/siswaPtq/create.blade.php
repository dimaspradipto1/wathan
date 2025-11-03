@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Siswa</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
              <h4 class="card-title">Form Guru</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('siswa.store')}}" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label>nik</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="number" name="nik" value="{{old('nik')}}" class="form-control" placeholder="nik siwa">
                      </div>

                      <div class="col-md-4">
                        <label>nama</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="nama" value="{{old('nama')}}" class="form-control" placeholder="nama siswa">
                      </div>

                      <div class="col-md-4">
                        <label>tempat lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control" placeholder="tempat lahir">
                      </div>

                      <div class="col-md-4">
                        <label>tanggal lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="date" name="tgl_lahir" value="{{old('tgl_lahir')}}" class="form-control" placeholder="tgl_lahir">
                      </div>

                      <div class="col-md-4">
                        <label>sekolah</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="sekolah" value="{{old('sekolah')}}" class="form-control" placeholder="sekolah">
                      </div>

                      <div class="col-md-4">
                        <label>kegiatan pondok</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <select name="kegiatan_pondok" id="" class="form-control">
                        <option value="">pilih</option>
                        <option disable>==============</option>
                        <option value="PTQ (Tahfiz Quran)" {{old('kegiatan_pondok') == 'PTQ (Tahfiz Quran)' ? 'selected' : ''}}>PTQ (Tahfiz Quran)</option> 
                        <option value="TPQ (Taman Pendidikan Quran)" {{old('kegiatan_pondok') == 'TPQ (Taman Pendidikan Quran)' ? 'selected' : ''}}>TPQ (Taman Pendidikan Quran)</option> 
                        <option value="PTQ dan TPQ" {{old('kegiatan_pondok') == 'PTQ dan TPQ' ? 'selected' : ''}}>PTQ dan TPQ</option> 
                      </select>
                      </div>

                     <div class="col-md-4">
                        <label>kegiatan tambahan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <select name="kegiatan_tambahan" id="" class="form-control">
                        <option value="">pilih</option>
                        <option disable>==============</option>
                        <option value="Team Hadoh" {{old('kegiatan_tambahan') == 'Team Hadoh' ? 'selected' : ''}}>Team Hadoh</option> 
                        <option value="Tilawah Al-Quran" {{old('kegiatan_tambahan') == 'Tilawah Al-Quran' ? 'selected' : ''}}>Tilawah Al-Quran</option> 
                        <option value="Kursus Bhasa Asing" {{old('kegiatan_tambahan') == 'Kursus Bhasa Asing' ? 'selected' : ''}}>Kursus Bhasa Asing</option> 
                      </select>
                      </div>

                      <div class="col-md-4">
                        <label>alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="alamat" id="" class="form-control" cols="30" rows="5">{{old('alamat')}}</textarea>
                      </div>

                      <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                        
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
