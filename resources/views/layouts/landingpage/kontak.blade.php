@extends('layouts.landingpage.template')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Kontak kami</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">kontak</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl contact py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
            <h1 class="display-6">If You Have Any Query, Please Contact Us</h1>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="btn-square mx-auto mb-3">
                    <i class="fa fa-envelope fa-2x text-white"></i>
                </div>
                <p class="mb-2">{{$kontak->email ?? '-'}}</p>
            </div>
            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                <div class="btn-square mx-auto mb-3">
                    <i class="fa fa-phone fa-2x text-white"></i>
                </div>
                <p class="mb-2">{{$kontak->hp ?? '-'}}</p>
            </div>
            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="btn-square mx-auto mb-3">
                    <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                </div>
                <p class="mb-2">{{$kontak->alamat ?? '-'}}</p>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4">silahkan kirim pesan?</h3>
                <form action="https://api.whatsapp.com/send" method="GET" id="whatsapp-form">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 120px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <iframe class="w-100 rounded"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.059751250845!2d103.981999!3d1.117289!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98b4478ab097d%3A0xe366f620fb292eec!2sPondok%20Tahfidz%20%26%20Tilawah%20Al-Quran%20%22%20Daarul%20Quran%20Wal-Hadits%20NW%22!5e0!3m2!1sid!2sid!4v1733958804844!5m2!1sid!2sid"
                    frameborder="0" style="height: 100%; min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<script>
    document.getElementById('whatsapp-form').addEventListener('submit', function(e) {
        e.preventDefault();

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;

        var whatsappURL = 'https://api.whatsapp.com/send?phone=+628228&text=' + 
                          encodeURIComponent("Name: " + name + "\nEmail: " + email + "\nSubject: " + subject + "\nMessage: " + message);

        // Redirect to WhatsApp
        window.location.href = whatsappURL;
    });
</script>

@endsection