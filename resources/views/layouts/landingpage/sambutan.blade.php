@extends('layouts.landingpage.template')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown text-uppercase">kata sambutan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">kata sambutan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Article Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 text-center wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid"
                        src="{{ $sambutan->image ? asset('storage/' . str_replace('public/', '', $sambutan->image)) : asset('landingpage/img/pemilik.png') }}"
                        alt="">
                    <p class="my-4 fw-bold">{{ $sambutan->nama_pemilik ?? 'Nama Pemilik' }}</p>
                    <p class="mb-4 fw-bold">{{ $sambutan->jabatan ?? 'Jabatan' }}</p>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">kata sambutan</p>
                    </div>
                    <p class="mb-4" style="text-align: justify">{{ $sambutan->deskripsi1 ?? '-' }}</p>
                    <p class="mb-4" style="text-align: justify">{{ $sambutan->deskripsi2 ?? '-' }}</p>
                    <p class="mb-4" style="text-align: justify">{{ $sambutan->deskripsi3 ?? '-' }}</p>
                    <p class="mb-4" style="text-align: justify">{{ $sambutan->deskripsi4 ?? '-' }}</p>
                    <p class="mb-4" style="text-align: justify">{{ $sambutan->deskripsi5 ?? '-' }}</p>
                    <ul>
                        <li>{{ $sambutan->deskripsi6 ?? '-' }}</li>
                        <li>{{ $sambutan->deskripsi7 ?? '-' }}</li>
                        <li>{{ $sambutan->deskripsi8 ?? '-' }}</li>
                        <li>{{ $sambutan->deskripsi9 ?? '-' }}</li>
                        <li>{{ $sambutan->deskripsi10 ?? '-' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->
@endsection
