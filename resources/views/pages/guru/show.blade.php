@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Preview Guru</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Guru</li>
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
              <h4 class="card-title">Detail guru</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="#" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>nama guru</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$guru->nama}}
                      </div>

                      <div class="col-md-4">
                        <label>tempat lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$guru->tempat_lahir}}
                      </div>

                      <div class="col-md-4">
                        <label>tanggal lahir</label>
                      </div>
                      <div class="col-md-8 form-group">
                      : {{\Carbon\Carbon::parse($guru->tgl_lahir)->format('d/m/Y')}}
                      </div>

                      <div class="col-md-4">
                        <label>pedidikan</label>
                      </div>

                      <div class="col-md-8 form-group">
                      : {{$guru->pendidikan}}
                      </div>

                      <div class="col-md-4">
                        <label>pekerjaan</label>
                      </div>
                      <div class="col-md-8 form-group">
                      : {{$guru->pekerjaan}}
                      </div>

                      <div class="col-md-4">
                        <label>tamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                      : {{$guru->tmt}}
                      </div>

                      <div class="col-md-4">
                        <label>alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       : {{$guru->alamat}}
                      </div>
                      

                      <div class="col-sm-12 d-flex justify-content-end">
                        <a href="{{route('guru.index')}}" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-right-to-bracket"></i> back</a>
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
