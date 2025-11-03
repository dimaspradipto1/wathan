@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Pengurus Pondok</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Pengurus Pondok</li>
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
              <h4 class="card-title">Form pengurus pondok</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('pengurus-pondok.update', $pengurusPondok->id)}}" class="form form-horizontal" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>nama pengurus pondok</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="nama" value="{{old('nama') ?? $pengurusPondok->nama}}" class="form-control" placeholder="nama pengurus poiondok">
                      </div>

                      <div class="col-md-4">
                        <label>jabatan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="jabatan" value="{{old('jabatan') ?? $pengurusPondok->jabatan}}" class="form-control" placeholder="jabatan">
                      </div>

                      <div class="col-md-4">
                        <label>pendidikan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="pendidikan" value="{{old('pendidikan') ?? $pengurusPondok->pendidikan}}" class="form-control" placeholder="pendidikan">
                      </div>

                      <div class="col-md-4">
                        <label>pekerjaan</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="pekerjaan" value="{{old('pekerjaan') ?? $pengurusPondok->pekerjaan}}" class="form-control" placeholder="pekerjaan">
                      </div>

                      <div class="col-md-4">
                        <label>nohp</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="number" name="nohp" value="{{old('nohp') ?? $pengurusPondok->nohp}}" class="form-control" placeholder="nohp">
                      </div>

                      <div class="col-md-4">
                        <label>alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="alamat" id="" class="form-control" cols="30" rows="5">{{old('alamat') ?? $pengurusPondok->alamat}}</textarea>
                      </div>

                      <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-1 mb-1 text-uppercase">update</button>
                        
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
