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
                <form action="{{route('legalitas.update', $legalita->id)}}" class="form form-horizontal" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label>perusahaan</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="perusahaan" value="{{old('perusahaan') ?? $legalita->perusahaan}}" class="form-control" placeholder="perusahaan">
                      </div>

                      <div class="col-md-4">
                        <label>pimpinan</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="pimpinan" value="{{old('pimpinan') ?? $legalita->pimpinan}}" class="form-control" placeholder="pimpinan">
                      </div>

                      <div class="col-md-4">
                        <label>notaris</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="notaris" value="{{old('notaris') ?? $legalita->notaris}}" class="form-control" placeholder="notaris">
                      </div>

                      <div class="col-md-4">
                        <label>akta notaris</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="akta_notaris" value="{{old('akta_notaris') ?? $legalita->akta_notaris}}" class="form-control" placeholder="akta_notaris">
                      </div>

                      <div class="col-md-4">
                        <label>ahu nomor</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="ahu_nomor" value="{{old('ahu_nomor') ?? $legalita->ahu_nomor}}" class="form-control" placeholder="ahu_nomor">
                      </div>

                      <div class="col-md-4">
                        <label>skep ppjk</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="skep_ppjk" value="{{old('skep_ppjk') ?? $legalita->skep_ppjk}}" class="form-control" placeholder="skep_ppjk">
                      </div>

                      <div class="col-md-4">
                        <label>alamat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="alamat" id="" class="form-control" cols="30" rows="5">{{old('alamat') ?? $legalita->alamat}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>kontak</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="number" name="kontak" value="{{old('kontak') ?? $legalita->kontak}}" class="form-control" placeholder="kontak">
                      </div>

                      <div class="col-md-4">
                        <label>email</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="email" name="email" value="{{old('email') ?? $legalita->email}}" class="form-control" placeholder="email">
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
