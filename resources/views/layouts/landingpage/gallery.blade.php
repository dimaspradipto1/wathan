@extends('layouts.landingpage.template')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Galleries</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Galleries</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- galleries Start -->
    <div class="container-fluid product py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Galleries</p>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                @forelse ($galleries as $item)
                    <a href="" class="d-block product-item rounded">
                        <img src="{{ $item->image ? asset('storage/' . str_replace('public/', '', $item->image)) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
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
    <!-- galleries End -->
@endsection
