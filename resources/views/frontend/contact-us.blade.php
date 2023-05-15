@extends('frontend.layouts.app')
@section('title')
    <style>
        .contact-border .contact-img {
            background: url('frontend/images/banner/contact-bg.png') !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }
    </style>
@section('content')
    {{-- first slider slider --}}
    <section class="pb-3">
        <div class="container">
            <div class="row justify-content-center my-5">

                <div class="col-md-12 p-md-5 p-4 contact-border">
                    <h2 class="text-red main-head text-center mb-3">Contact US</h2>
                    <div class="row main-group-card pt-5 mx-md-4 mb-md-4 contact-img">
                        <h3 class="text-center text-white">Contact Information</h3>
                        <p class="text-white text-center">Get In Touch</p>
                        <div class="col-lg-6 px-5 py-5">

                            <ul class="list-unstyled ">

                                <li class="gap-2 d-flex align-items-center mt-sm-4 mt-3">
                                    <i class="fas fa-phone  text-white"></i>
                                    <a href="tel:+917710062724" class="footer-links-hover text-white">+91-7710062724</a>
                                </li>

                                <li class="gap-2 d-flex align-items-center footer-links-hover mt-sm-4 mt-3">
                                    <i class="fas fa-envelope text-white"></i>
                                    <a href="mailto:channeltheshop@yahoo.co.in "
                                        class="text-white">channeltheshop@yahoo.co.in </a>
                                </li>





                            </ul>
                            <ul class="list-unstyled d-flex gap-2 p-0">
                                <li>
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </li>
                                <li class="text-white">
                                    Shop No. 5 & 6, Sunview Apartment, Tilak Nagar, Chembur (West), Mumbai - 400089.
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-5 py-5">
                            <div class="card py-5">
                                <i class="fas fa-clock  text-red d-block  f-s-50"></i>
                                <p class="text-red text-center mt-3">Timings</p>
                                <hr class="text-red w-50 mx-auto py-0 my-0">
                                <p class="text-center text-red py-0 my-0 mt-3">Mon-Sat</p>
                                <p class="text-center text-red py-0 my-0">
                                    10:00am to 6.00pm</p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
@section('js')
    <script>
        $('.rise-up-slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            arrows: false,
            dots: false,
            speed: 300,
            centerPadding: '0px',
            infinite: true,
            autoplaySpeed: 2000,
            autoplay: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>

    <script>
        window.onload = function() {
            $('.frontend-top-slider').slick({
                autoplay: true,
                autoplaySpeed: 1000,
                arrows: false,
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 2
            });
        };
    </script>
@endsection
