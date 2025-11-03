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
              <h4 class="card-title">Form Siswa TPQ</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="#" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label>nik</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->nik}}
                      </div>

                      <div class="col-md-4">
                        <label>nama</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->nama}}
                      </div>

                      <div class="col-md-4">
                        <label>tempat lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->tempat_lahir}}
                      </div>

                      <div class="col-md-4">
                        <label>tanggal lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{ \Carbon\Carbon::parse($siswa->tgl_lahir)->format('d-m-Y') }}
                      </div>

                      <div class="col-md-4">
                        <label>sekolah</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->sekolah}}
                      </div>

                      <div class="col-md-4">
                        <label>kegiatan pondok</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->kegiatan_pondok}}
                      </div>

                     <div class="col-md-4">
                        <label>kegiatan tambahan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->kegiatan_tambahan}}
                      </div>

                      <div class="col-md-4">
                        <label>alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$siswa->alamat}}
                      </div>

                      <div class="col-sm-12 d-flex justify-content-end">
                        <a href="{{route('siswaptqtpq.index')}}" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-right-to-bracket"></i> back</a>
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
