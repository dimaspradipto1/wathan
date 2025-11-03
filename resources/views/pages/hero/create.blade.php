@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Hero</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Hero</li>
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
              <h4 class="card-title">Form Hero</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('hero.store')}}" class="form form-horizontal" method="POST" enctype="multipart/form-data">
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
                        <label>judul</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="judul" value="{{old('judul')}}" class="form-control" placeholder="judul">
                      </div>

                      <div class="col-md-4">
                        <label>deskripsi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="deskripsi" id="" class="form-control" cols="30" rows="5">{{old('deskripsi')}}</textarea>
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
