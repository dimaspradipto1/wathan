@extends('layouts.landingpage.template')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown text-uppercase">struktur organisasi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">struktur organisasi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- struktur Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                @if($organisasi && $organisasi->image)
                    <img class="img-fluid" src="{{ Storage::url($organisasi->image) }}" style="width: 800px; height: auto;" alt="Organization Structure">
                @else
                    <div class="text-center">
                        <p>Sturktur Organisani Belum Tersedia</p>
                       
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- struktur End -->

@endsection