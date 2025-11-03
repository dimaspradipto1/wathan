@extends('layouts.dashboard.template')

@section('content')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Form User</h3>
          <p class="text-subtitle text-muted">form layout you can use</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Form User</li>
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
              <h4 class="card-title">Form User</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form action="{{route('user.store')}}" class="form form-horizontal" method="POST">
                  @csrf

                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>nama pengguna</label>
                      </div>
                      <div class="col-md-8 form-group">
                      <input type="text" name="name" value="{{old('email')}}" class="form-control" placeholder="nama pengguna">
                      </div>

                      <div class="col-md-4">
                        <label>email</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="email pengguna">
                      </div>

                      <div class="col-md-4">
                        <label>password</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <input type="text" name="password" value="{{old('password')}}" class="form-control" placeholder="password">
                      </div>

                      <div class="col-md-4">
                        <label>status</label>
                      </div>
                      <div class="col-md-8 form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="true" id="checkbox-admin" name="is_admin" value="{{old('is_admin')}}">
                          <label class="form-check-label" >
                            admin
                          </label>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="true" id="checkbox-admin" name="is_user" value="{{old('is_user')}}">
                          <label class="form-check-label" >
                            user
                          </label>
                        </div>
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
