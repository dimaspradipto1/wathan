@extends('layouts.landingpage.template')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('landingpage/img/bg-nwbatam.jpg') }}" alt="No Image"
                        style="height: 70vh; object-fit: cover; width: 100%;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Welcome to <strong class="text-dark">Our
                                            Website</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn text-white text-uppercase"
                                        style="font-size: 50px">Welcome</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($hero as $item)
                    <div class="carousel-item">
                        <img class="w-100"
                            src="{{ $item->image ? Storage::url($item->image) : asset('landingpage/img/bg-nwbatam.jpg') }}"
                            alt="Image" style="height: 70vh; object-fit: cover; width: 100%;">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 text-center">
                                        <p class="fs-4 text-white animated zoomIn">Welcome to <strong
                                                class="text-dark">{{ $item->judul }}</strong></p>
                                        <h1 class="display-1 text-dark mb-4 animated zoomIn text-white text-uppercase"
                                            style="font-size: 50px">{{ $item->deskripsi }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- sambutan Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="text-center">
                        <img class="img-fluid"
                            src="{{ $sambutan->image ? Storage::url($sambutan->image) : asset('landingpage/img/pemilik.png') }}"
                            alt="">
                        <p class="my-4 fw-bold">{{ $sambutan->nama_pemilik ?? 'Nama Pemilik' }}</p>
                        <p class="mb-4 fw-bold">{{ $sambutan->jabatan ?? 'Jabatan' }}</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">kata sambutan</p>
                    </div>
                    <p class="mb-4" style="text-align: justify">{{ $sambutan->deskripsi1 ?? '-' }}</p>
                    <a href="{{ route('homesambutan') }}" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- sambutan End -->


    <!-- Gallery Start -->
    <div class="container-fluid product py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Galleries</p>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                @forelse ($galleries as $item)
                    <a href="" class="d-block product-item rounded">
                        <img src="{{ $item->image ? Storage::url($item->image) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
                            alt="Gallery Image" style="width: 100%; height: 200px; object-fit: cover;">
                    </a>
                @empty
                    <a href="" class="d-block product-item rounded">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                            alt="No Gallery Image" style="width: 100%; height: 200px; object-fit: cover;">
                    </a>
                @endforelse
            </div>
        </div>
    </div>
    <!-- <!-- Gallery Start -->


    <!-- Article Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary text-capitalize">our video</p>
                <h1 class="display-6 text-capitalize">yayasan darul qur'an wal hadits nahdlatul wathan batam</h1>
            </div>

            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0s">
                @foreach ($video as $video)
                    <!-- Looping untuk setiap video -->
                    <a href="{{ $video->link }}" class="d-block product-item rounded" target="_blank">
                        <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                            <!-- Membuat iframe untuk setiap video dengan URL embed -->
                            @php
                                $embedUrl = $video->link;

                                if (
                                    strpos($video->link, 'youtu.be') !== false ||
                                    strpos($video->link, 'youtube.com') !== false
                                ) {
                                    // Mendapatkan video ID dari URL YouTube
                                    preg_match(
                                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]+)/',
                                        $video->link,
                                        $matches,
                                    );
                                    $videoId = isset($matches[1]) ? $matches[1] : null;

                                    // Jika video ID ditemukan, ubah menjadi embed URL
                                    if ($videoId) {
                                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                                    }
                                }
                            @endphp

                            <!-- Embed video menggunakan iframe -->
                            <iframe width="100%" height="200" src="{{ $embedUrl }}" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <h4 class="text-primary mt-2">{{ $video->judul }}</h4>
                            <span class="text-body">{{ $video->deskripsi }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Article End -->


    <!-- Video Start -->
    <div class="container-fluid video" style="margin-top: 6rem; margin-bottom: 6rem;">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="py-5">
                        <h1 class="display-6 mb-4 text-capitalize">keunggulan yayasan darul qur'an wal hadits <span
                                class="text-white"> Nadhlatul Wathan </span> batam</h1>
                        <div class="row g-4 mb-5">
                            @foreach ($unggulan as $item)
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 btn-lg-square bg-white text-primary rounded-circle me-3">
                                            <i class="fa fa-check"></i>
                                        </div>
                                        <span class="text-dark text-white">{{ $item->deskripsi }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <a class="btn btn-light rounded-pill py-3 px-5" href="">Explore More</a>
                    </div>
                </div>
                {{--  <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                    <button type="button" class="btn-play" data-bs-toggle="modal"
                        data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>  --}}
            </div>
        </div>
    </div>
    <!-- Video End -->



    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">Contact us right now</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <p class="text-center mb-5">Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et
                        lorem et sit, sed stet lorem sit clita duo justo Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo</p>
                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">{{ $kontak->email ?? '-' }}</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">{{ $kontak->hp ?? '-' }}</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">{{ $kontak->alamat ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->
@endsection
