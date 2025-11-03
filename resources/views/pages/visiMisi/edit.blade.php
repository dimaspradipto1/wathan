@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form Layout</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
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
              <h4 class="card-title">Form visi dan misi</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('visimisi.update', $visimisi->id)}}" class="form form-horizontal" method="POST">
                  @csrf
                  @method('PUT')

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>visi</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="visi" id="" class="form-control" cols="30" rows="5">{{old('visi') ?? $visimisi->visi}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>misi 1</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="misi1" id="" class="form-control" cols="30" rows="5">{{old('misi1') ?? $visimisi->misi1}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>misi 2</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="misi2" id="" class="form-control" cols="30" rows="5">{{old('misi2') ?? $visimisi->misi2}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>misi 3</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="misi3" id="" class="form-control" cols="30" rows="5">{{old('misi3') ?? $visimisi->misi3}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>misi 4</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="misi4" id="" class="form-control" cols="30" rows="5">{{old('misi4') ?? $visimisi->misi4}}</textarea>
                      </div>

                      <div class="col-md-4">
                        <label>misi 5</label>
                      </div>
                      <div class="col-md-8 form-group">
                       <textarea name="misi5" id="" class="form-control" cols="30" rows="5">{{old('misi5') ?? $visimisi->misi5}}</textarea>
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
