@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Legalitas</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Legalitas</li>
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
              <h4 class="card-title">Form legalitas</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="#" class="form form-horizontal" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label>perusahaan</label>
                      </div>
                      <div class="col-md-8 form-group">
                      : {{$legalita->perusahaan}}
                      </div>

                      <div class="col-md-4">
                        <label>pimpinan</label>
                      </div>
                      <div class="col-md-8 form-group">
                      : {{$legalita->pimpinan}}
                      </div>

                      <div class="col-md-4">
                        <label>notaris</label>
                      </div>
                      <div class="col-md-8 form-group">
                      : {{$legalita->notaris}}
                      </div>

                      <div class="col-md-4">
                        <label>akta notaris</label>
                      </div>
                      <div class="col-md-8 form-group">
                        : {{$legalita->akta_notaris}}
                      </div>

                      <div class="col-md-4">
                        <label>ahu nomor</label>
                      </div>
                      <div class="col-md-8 form-group">
                        :{{$legalita->ahu_nomor}}
                      </div>

                      <div class="col-md-4">
                        <label>skep ppjk</label>
                      </div>
                      <div class="col-md-8 form-group">
                        : {{$legalita->skep_ppjk}}
                      </div>

                      <div class="col-md-4">
                        <label>alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                        : {{$legalita->alamat}}
                      </div>

                      <div class="col-md-4">
                        <label>kontak</label>
                      </div>
                      <div class="col-md-8 form-group">
                        : {{$legalita->kontak}}
                      </div>

                      <div class="col-md-4">
                        <label>email</label>
                      </div>
                      <div class="col-md-8 form-group">
                        : {{$legalita->email}}
                      </div>
                      
                      <div class="col-sm-12 d-flex justify-content-end">
                        <a href="{{route('legalitas.index')}}" class="btn btn-sm btn-warning text-white mx-2 my-2"><i class="fa-solid fa-right-to-bracket"></i> back</a>
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
