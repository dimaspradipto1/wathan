@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Guru</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Guru</li>
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
                <form action="{{route('guru.store')}}" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>nama</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="nama" value="{{old('nama')}}" class="form-control" placeholder="nama guru">
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
                        <label>pendidikan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="pendidikan" value="{{old('pendidikan')}}" class="form-control" placeholder="pendidikan">
                      </div>

                      <div class="col-md-4">
                        <label>pekerjaan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="pekerjaan" value="{{old('pekerjaan')}}" class="form-control" placeholder="pekerjaan">
                      </div>

                      <div class="col-md-4">
                        <label>tamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="tmt" value="{{old('tmt')}}" class="form-control" placeholder="tmt">
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
