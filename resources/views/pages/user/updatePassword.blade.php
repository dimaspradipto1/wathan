@extends('layouts.dashboard.template')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Update Password</h3>
                    <p class="text-subtitle text-muted">form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Update Password</li>
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
                            <h4 class="card-title">Form Update Password</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('user.updatePassword', $user->id) }}" class="form form-horizontal"
                                    method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>password baru</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" name="password" value="{{ old('password') }}"
                                                    class="form-control" placeholder="password baru">
                                            </div>

                                            <div class="col-md-4">
                                                <label>konfirmasi password baru</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="password" name="new_password_confirmation"
                                                    value="{{ old('new_password_confirmation') }}" class="form-control"
                                                    placeholder="konfirmasi password baru">
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success me-1 py-2">Submit</button>
                                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-danger py-2">BACK
                                                    <i class="fa-solid fa-right-from-bracket"></i></a>
                                                </button>
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
