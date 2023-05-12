@extends('frontend.layouts.app')
@section('title')
@section('content')
    {{-- first slider slider --}}
    <section class="pb-3">
        <div class="container">
            <div class="row main-group-card">
                <h2 class="text-red main-head text-center my-5">Shipping Policy</h2>
                <h3 class="py-3">Shipping Policy</h3>
                <p>We ship our products all over India </p>
                <h5 class="pb-2">How does the delivery process work? </h5>
                <p>Once our system processes your order, your products are inspected thoroughly to
                    ensure they are in perfect condition. </p>
                <p>After they pass through the final round of quality checks, they are packed and
                    handed over to our trusted delivery partner.</p>
                <h5 class="pb-2">How are items packaged? </h5>
                <p>We package our products in individual boxes. Each product is packaged with a
                    plastic layer and in bubble wrap while fragile items like bottles are safely secured
                    with additional bubble wrap. </p>
                <p>We pride ourselves on the quality of our packaging.</p>
                <h5 class="pb-2">How to track your package? </h5>
                <p>Once your order has been dispatched, you will receive an email with the details of
                    the tracking number and the courier company that is processing your order. </p>
                <p>You can track the status of your package after the order is placed on the order status
                    page and an e-mail including the tracking link is emailed once the order is shipped.</p>
                <h5 class="pb-2">What is the estimated delivery time?</h5>
                <p>We usually dispatch most orders within 1-2 business days (excluding Sundays and
                    public holidays), and it usually takes up to 5 days for the package to be delivered.</p>
                <h5 class="pb-2">Shipping rates for orders? </h5>
                <p>We provide free shipping for all orders above Rs.999, and a flat fee of Rs.99 is
                    charged for all orders below Rs.999</p>

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
