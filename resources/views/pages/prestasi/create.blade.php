@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3 class="text-capitalize">form lembar prestasi</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">form lembar prestasi</li>
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
              <h4 class="card-title text-capitalize">form lembar prestasi</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('prestasi.store')}}" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">

                      <div class="col-md-4">
                        <label class="text-capitalize">tanggal</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="date" name="tanggal" value="{{old('tanggal')}}" class="form-control" placeholder="tanggal">
                      </div>

                      <div class="col-md-4">
                        <label class="text-capitalize">siswa</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <select name="siswa_id" id="" class="form-control">
                        <option value="">pilih</option>
                        <option disable>==============</option>
                        @foreach ($siswa as $item)
                          <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                      </select>
                      </div>
                      
                      <div class="col-md-4">
                        <label class="text-capitalize">surat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="surat" id="" class="form-control" placeholder="input surat">{{ old('surat') }}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label class="text-capitalize">ayat</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="text" name="ayat" value="{{old('input_ayat')}}" class="form-control" placeholder="input ayat">
                      </div>

                      <div class="col-md-4">
                        <label class="text-capitalize">nilai</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <input type="number" name="nilai" value="{{old('nilai')}}" class="form-control" placeholder="nilai">
                      </div>

                      <div class="col-md-4">
                        <label class="text-capitalize">tugas</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="tugas" id="" class="form-control" placeholder="input tugas">{{ old('tugas') }}</textarea>
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
