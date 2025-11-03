@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Sambutan</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Sambutan</li>
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
              <h4 class="card-title">Form Sambutan</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('sambutan.store')}}" class="form form-horizontal" method="POST" enctype="multipart/form-data">
                  @csrf

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label>upload file</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="file" name="image" class="form-control">
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi1" id="" class="form-control" cols="30" rows="5">{{old('deskripsi1')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi2" id="" class="form-control" cols="30" rows="5">{{old('deskripsi2')}}</textarea>
                      </div>
                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi3" id="" class="form-control" cols="30" rows="5">{{old('deskripsi3')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi4" id="" class="form-control" cols="30" rows="5">{{old('deskripsi4')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi5" id="" class="form-control" cols="30" rows="5">{{old('deskripsi5')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi6" id="" class="form-control" cols="30" rows="5">{{old('deskripsi6')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi7" id="" class="form-control" cols="30" rows="5">{{old('deskripsi7')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi8" id="" class="form-control" cols="30" rows="5">{{old('deskripsi8')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi9" id="" class="form-control" cols="30" rows="5">{{old('deskripsi9')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi10" id="" class="form-control" cols="30" rows="5">{{old('deskripsi10')}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>nama pemilik</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="nama_pemilik" value="{{old('nama_pemilik')}}" class="form-control" placeholder="nama pemilik">
                      </div>

                       <div class="col-md-4">
                        <label>jabtan</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="jabatan" value="{{old('jabatan')}}" class="form-control" placeholder="jabatan">
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
