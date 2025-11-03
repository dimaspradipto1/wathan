@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3 class="text-capitalize">form doa harian</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">form doa harian</li>
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
              <h4 class="card-title text-capitalize">form doa harian</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('doa-harian.store')}}" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label class="text-capitalize">doa harian</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="doa_harian" value="{{old('doa_harian')}}" class="form-control" placeholder="doa harian">
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
