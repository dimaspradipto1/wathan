@extends('layouts.landingpage.template')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown text-uppercase">Keunggulan</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Keunggulan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- keunggulan Start -->
<div class="container-fluid video" style="margin-top: 6rem; margin-bottom: 6rem;">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="py-5">
                    <h1 class="display-6 mb-4 text-capitalize">keunggulan yayasan darul quran wal hadits <span class="text-white"> Nadhlatul Wathan </span> batam</h1>
                    <div class="row g-4 mb-5">
                        @if(count($unggulan) > 0)
                            @foreach ($unggulan as $item)
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <span class="text-dark text-white">{{$item->deskripsi}}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <div class="text-center">
                                    <span class="text-dark text-white">Keunggulan belum tersedia</span>
                                </div>
                            </div>
                        @endif
                        
                    </div>
                    <a class="btn btn-light rounded-pill py-3 px-5" href="">Explore More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- keunggulan End -->

@endsection