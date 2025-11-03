@extends('layouts.landingpage.template')

@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
      <h1 class="display-2 text-dark mb-4 animated slideInDown text-uppercase">Video</h1>
      <nav aria-label="breadcrumb animated slideInDown">
        <ol class="breadcrumb justify-content-center mb-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Pages</a></li>
          <li class="breadcrumb-item text-dark" aria-current="page">Video</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- Page Header End -->



  <div class="container-fluid product py-5">
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

                if (strpos($video->link, 'youtu.be') !== false || strpos($video->link, 'youtube.com') !== false) {
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
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <h4 class="text-primary mt-2">{{ $video->judul }}</h4>
              <span class="text-body">{{ $video->deskripsi }}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
