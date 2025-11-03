@extends('layouts.landingpage.template')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown text-uppercase">visi dan misi</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">visi dan misi</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-10 wow fadeIn" data-wow-delay="0.5s">
                <div class="section-title">
                    <p class="fs-5 fw-medium fst-italic text-primary text-uppercase">visi</p>
                    <h4 class="mb-0">{{$visimisi->visi ?? '-'}}</h4>
                </div>
                <div class="border-top mb-4"></div>

                <div class="section-title">
                    <p class="fs-5 fw-medium fst-italic text-primary text-uppercase">misi</p>
                    <ul>
                        <li>{{$visimisi->misi1 ?? '-'}}</li>
                        <li>{{$visimisi->misi2 ?? '-'}}</li>
                        <li>{{$visimisi->misi3 ?? '-'}}</li>
                        <li>{{$visimisi->misi4 ?? '-'}}</li>
                        <li>{{$visimisi->misi5 ?? '-'}}</li>
                    </ul>
                </div>

                <div class="col-sm-8">
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- About End -->
@endsection