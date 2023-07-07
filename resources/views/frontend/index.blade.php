@extends('frontend.layouts.app')
@section('title')
@section('content')
    {{-- first slider slider --}}
    <section>
        <div class="container">
            <div class="row main-group-card">
                <h2 class="text-red main-head text-capitalize mt-4 mb-3">#Bestseller of channel</h2>

                @if ($leftSliders->count())
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">

                        <div class="frontend-top-slider">
                            @forelse ($leftSliders as $leftslider)
                                <div class="slide" style="padding:0px 10px 0px 10px">
                                    <img src="{{ asset('storage/images/sliders/' . $leftslider->image) }}" class="img-fluid"
                                        alt="image description " style="">
                                    <div class="slide-content">
                                        <div class="slide-content-desc">
                                            <h3 class="">{{ $leftslider->title }}</h3>
                                            <p class="">{{ $leftslider->descriptions }} </p>
                                            <a class="d-flex gap-2 justify-content-center " href="{{ $leftslider->link }}">
                                                <span class="group-card-shop-btn ">Shop Now</span>
                                                <i class="fa fa-angle-right group-button-arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                @endif
                @if ($middleSlider)
                    <div
                        class="col-sm-6 col-md-6  col-lg-6 col-lg-6  col-xl-3 group-card-2 d-flex align-items-center py-3 py-xl-0">
                        <div class="card second-group-card">
                            <img src="{{ asset('storage/images/sliders/' . $middleSlider->image) }}"
                                class="img-fluid second-group-img" alt="...">
                            <div class="card-body text-center  second-group-card-body">
                                <h4 class="card-title text-center font-head ">{{ $middleSlider->title }}</h4>
                                <p class="card-text group-card-text-color">
                                    {{ $middleSlider->descriptions }}
                                </p>

                                <button type="button" class="text-center group-buutton-bg-disable">
                                    <a class=" d-flex gap-2" href="{{ $middleSlider->link }}">
                                        <span class="group-card-shop-btn ">Shop Now</span>
                                        <i class="fa fa-angle-right group-button-arrow"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($rightSliders->count())
                    <div
                        class="col-sm-6 col-md-6 col-lg-6  col-lg-6 col-xl-3 group-card-3 gap-3 gap-lg-5 gap-xl-3 gap-xxl-4
                    d-flex flex-column justify-content-center py-3 py-xl-0 ">
                        @forelse ($rightSliders as $rigslider)
                            <div class="card fourth-group-card">
                                <img src="{{ asset('storage/images/sliders/' . $rigslider->image) }}"
                                    class="card-img-top fourth-group-img" alt="..."
                                    style="border-radius: 26.6782px 26.6782px 0px 0px;">
                                <div class="card-body text-center fourth-group-card-body">
                                    <h4 class="card-title text-center font-head m-0">{{ $rigslider->title }}</h4>


                                    <p class="card-text group-card-text-color m-0">
                                        {{ $rigslider->descriptions }}
                                    </p>


                                    <a class=" d-flex  justify-content-center gap-2 text-center group-buutton-bg-disable"
                                        href="{{ $rigslider->link }}">
                                        <span class="group-card-shop-btn ">Shop Now</span>
                                        <i class="fa fa-angle-right group-button-arrow"></i>
                                    </a>


                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- skin slider with latest & best seller --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
                        <!-- producttabs start here -->
                        <ul class="producttabs">
                            <li> Skin Care</li>
                            <li><a href="#skinlatest" class="text-capitalize active">Latest</a></li>
                            <li><a href="#skinpopular" class="text-capitalize">Popular</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        <div id="skinlatest">
                            <!-- tabs slider start here -->
                            <div class="skin-sliderlg">
                                {{-- @for ($i = 1; $i < 7; $i++) --}}
                                @foreach ($latestSkinProducts as $p)
                                    <!-- slide start here -->
                                    <div class="slide skin-slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large mt-skin-product1 w-100">
                                            <div class="box skin-box">
                                                <a href="{{ route('frontend.p.show', $p->slug) }}">
                                                    <img src="{{ asset('storage/images/products/' . $p->thumbnail_image) }}"
                                                        alt="image description">
                                                </a>
                                                @if ($p->isInWishlist())
                                                    <button class="btn like-btn-skin add-to-wish active"
                                                        data-p-id="{{ $p->id }}">
                                                        <span class="has-tool-tip">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </span>
                                                    </button>
                                                @else
                                                    <button class="btn like-btn-skin add-to-wish"
                                                        data-p-id="{{ $p->id }}">
                                                        <span class="has-tool-tip">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </span>
                                                    </button>
                                                @endif
                                                <div class="links skin-text-desc py-2 px-3">
                                                    <div class="card-title  m-0 text-center pro-head"
                                                        title="{{ $p->name }}">
                                                        <h4 class="">{{ str_limit($p->name, 50) }}</h4>
                                                    </div>
                                                    <p class="card-text text-center">{{ $p->short_description }}
                                                    </p>
                                                    <button type="button" class="btn btn-light sk-btn shop-now-btn"
                                                        title="{{ $p->name }}">
                                                        <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                            class="p-0  text-black">
                                                            Shop Now
                                                        </a>
                                                    </button>

                                                </div>
                                            </div>
                                        </div><!-- mt product1 center end here -->
                                    </div>
                                    {{-- @endfor --}}
                                @endforeach
                            </div>
                            <!-- tabs slider end here -->
                        </div>

                        <div id="skinpopular">
                            <!-- tabs slider start here -->
                            <div class="skin-sliderlg">
                                {{-- @for ($i = 1; $i < 7; $i++) --}}
                                @foreach ($popularSkinProducts as $p)
                                    <!-- slide start here -->
                                    <div class="slide  skin-slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large mt-skin-product1 w-100">
                                            <div class="box skin-box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="{{ route('frontend.p.show', $p->slug) }}">
                                                            <img src="{{ asset('storage/images/products/' . $p->thumbnail_image) }}"
                                                                alt="image description">
                                                        </a>

                                                        @if ($p->isInWishlist())
                                                            <button class="btn like-btn-skin add-to-wish active"
                                                                data-p-id="{{ $p->id }}">
                                                                <span class="has-tool-tip">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </span>
                                                            </button>
                                                        @else
                                                            <button class="btn like-btn-skin add-to-wish"
                                                                data-p-id="{{ $p->id }}">
                                                                <span class="has-tool-tip">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </span>
                                                            </button>
                                                        @endif
                                                        <ul class="links skin-text-desc py-2 px-3">
                                                            <div class="card-title  m-0 text-center pro-head"
                                                                title="{{ $p->name }}">
                                                                <h4 class="">{{ str_limit($p->name, 50) }}</h4>
                                                            </div>
                                                            <p class="card-text text-center">{{ $p->short_decriptions }}
                                                            </p>


                                                            <button type="button"
                                                                class="btn btn-light sk-btn shop-now-btn"
                                                                title="{{ $p->name }}">
                                                                <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                    class="p-0  text-black">
                                                                    Shop Now
                                                                </a>
                                                            </button>
                                                        </ul>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- mt product1 center end here -->
                                    </div>
                                @endforeach
                                {{-- @endfor --}}
                            </div>
                            <!-- tabs slider end here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FRAGRANCES slider --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
                        <!-- producttabs start here -->
                        <ul class="producttabs">
                            <li> Fragrances</li>
                            <li><a href="#fragranceslatest" class="text-capitalize active">Latest</a></li>
                            <li><a href="#fragrancespopular" class="text-capitalize">Popular</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="fragranceslatest">
                                <!-- tabs slider start here -->
                                <div class="fragrances ">
                                    {{-- @for ($i = 1; $i < 6; $i++) --}}
                                    @foreach ($latestFragrancesProducts as $p)
                                        <!-- slide start here -->
                                        <div class="slide fragrances-slide">
                                            <!-- mt product1 large start here -->
                                            <div class="mt-product1 large mt-fragrances">
                                                <div class="box fragrances-box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('frontend.p.show', $p->slug) }}">
                                                                <img src="{{ asset('storage/images/products/' . $p->thumbnail_image) }}"
                                                                    alt="image description">
                                                            </a>

                                                            <ul class="links fragrances-text-desc">
                                                                <div
                                                                    class="card-title card-text-heading m-0 text-center pro-head ">
                                                                    {{ $p->name }}
                                                                </div>
                                                                {{-- <p class="card-text text-center">
                                                                    {{ $p->short_descriptions }}
                                                                </p> --}}
                                                                <h5 class="text-center">
                                                                    <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                        class="p-0 main-head text-black"
                                                                        title="{{ $p->name }}">
                                                                        Shop Now
                                                                    </a>
                                                                </h5>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- mt product1 center end here -->
                                        </div>
                                    @endforeach
                                    {{-- @endfor --}}
                                </div>
                                <!-- tabs slider end here -->
                            </div>

                            <div id="fragrancespopular">
                                <!-- tabs slider start here -->
                                <div class="fragrances">
                                    {{-- @for ($i = 1; $i < 6; $i++) --}}
                                    @foreach ($popularFragrancesProducts as $p)
                                        <!-- slide start here -->
                                        <div class="slide fragrances-slide">
                                            <!-- mt product1 large start here -->
                                            <div class="mt-product1 large mt-fragrances ">
                                                <div class="box fragrances-box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('frontend.p.show', $p->slug) }}">
                                                                <img src="{{ asset('storage/images/products/' . $p->thumbnail_image) }}"
                                                                    alt="image description">
                                                            </a>
                                                            <ul class="links fragrances-text-desc">
                                                                <div
                                                                    class="card-title card-text-heading m-0 text-center pro-head ">
                                                                    {{ $p->name }}
                                                                </div>
                                                                {{-- <p class="card-text text-center">
                                                                    {{ $p->short_descriptions }}</p> --}}
                                                                <h5 class="text-center">
                                                                    <a href="{{ route('frontend.p.show', $p->slug) }}"
                                                                        class="p-0 main-head text-black"
                                                                        title="{{ $p->name }}">
                                                                        Shop Now
                                                                    </a>
                                                                </h5>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- mt product1 center end here -->
                                        </div>
                                    @endforeach
                                    {{-- @endfor --}}
                                </div>
                                <!-- tabs slider end here -->
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <h2 class="text-orange text-center text-capitalize">
                Transform your living space into a cozy
                <br> sanctuary with unique <span class="text-pink"> home decor</span> accents
            </h2>

            <div class="rise-up-slider">

                @foreach ($latestHomeDecorProducts as $p)
                    <div class="rise-up-slider-card">
                        <img class="product" src="{{ asset('storage/images/products/' . $p->thumbnail_image) }}"
                            alt="" class="img-fluid w-100">
                        <div class="text">
                            <div>
                                <h4 class="text-capitalize" title="{{ $p->name }}">
                                    {{ str_limit($p->name, 50) }}
                                </h4>
                                ₹{{ $p->final_price }} <s class="text-muted">₹{{ $p->mrp }}</s>
                            </div>
                            <div>
                                {{-- @if ($p->isInWishlist()) --}}
                                <button class="like-btn btn btn wishlist add-to-wish active" {{-- data-p-id="{{ $p->id }}" --}}>
                                    <span class="has-tool-tip">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </button>
                                {{-- @else
                                    <button class="like-btn btn btn wishlist add-to-wish"
                                        data-p-id="{{ $p->id }}">
                                        <span class="has-tool-tip">
                                            <i class="fa-regular fa-heart"></i>
                                        </span>
                                    </button>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($latestHomeDecorProducts as $p)
                    <div class="rise-up-slider-card">
                        <img class="product" src="{{ asset('storage/images/products/' . $p->thumbnail_image) }}"
                            alt="" class="img-fluid w-100">
                        <div class="text">
                            <div>
                                <h4 class="text-capitalize" title="{{ $p->name }}">
                                    {{ str_limit($p->name, 50) }}
                                </h4>
                                ₹{{ $p->final_price }} <s class="text-muted">₹{{ $p->mrp }}</s>
                            </div>
                            <div>
                                {{-- @if ($p->isInWishlist()) --}}
                                <button class="like-btn btn btn wishlist add-to-wish active" {{-- data-p-id="{{ $p->id }}" --}}>
                                    <span class="has-tool-tip">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </button>
                                {{-- @else
                                <button class="like-btn btn btn wishlist add-to-wish"
                                    data-p-id="{{ $p->id }}">
                                    <span class="has-tool-tip">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </button>
                            @endif --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>


    {{-- organic-product slider --}}

    <section class="og-main-section">
        <div class="container og-main">
            <div class="sib-card">
                <div class="og-main-part-1">
                    <h3 class="text-red card-text-heading text-capitalize" style="padding:40px 0px 40px 0px">#look for
                        personal care too..
                    </h3>

                    <img src="frontend/images/organic-product/og-1.png" alt="" class="og-main-img-first">
                    <img src="frontend/images/organic-product/og-2.png" alt="" class="og-main-img-second">
                    <img src="frontend/images/organic-product/og-4.png" alt="" class="og-main-img-third">
                    <img src="frontend/images/organic-product/og-5.png" alt="" class="og-main-img-fourth">
                    <img src="frontend/images/organic-product/og-3.png" alt="" class="og-main-img-fifth">

                    <div class="organic-product-slider og-main-card">
                        <div class="text og-main-text">
                            <div class="og-main-sy">
                                <h3 class="pro-head">Pure And Organic <br />Products </h3>

                                <p style="font-weight: 300;" class="text-capitalize">
                                    Enhance your self-care routine with<br />
                                    our premium personal care products.
                                </p>

                            </div>
                            <div class="og-main-button">
                                <button type="button" class="oganic-button">
                                    <a href="{{ route('frontend.cat.show', 'personal-care') }}">
                                        Shop Now
                                    </a>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>


                <div class=" og-main-part-1">
                    <h3 class="text-red card-text-heading text-capitalize" style="padding:40px 0px 40px 0px">
                        #best hair care product
                    </h3>

                    <img src="frontend/images/organic-product/og-1.png" alt="" class="og-main-img-first">
                    <img src="frontend/images/organic-product/og-2.png" alt="" class="og-main-img-second">
                    <img src="frontend/images/organic-product/og-4.png" alt="" class="og-main-img-third">
                    <img src="frontend/images/organic-product/og-5.png" alt="" class="og-main-img-fourth">
                    <img src="frontend/images/organic-product/og-3.png" alt="" class="og-main-img-fifth">

                    <div class="organic-product-slider og-main-card">
                        <div class="text og-main-text">
                            <div class="og-main-sy">
                                <h3 class="pro-head">Nourishing And<br /> Revitalizing Hair Products</h3>

                                <p style="font-weight: 300;" class="text-capitalize">
                                    Enhance your self-care routine with <br />our premium personal care products.

                                </p>

                            </div>
                            <div class="og-main-button">
                                <button type="button" class="oganic-button">
                                    <a href="{{ route('frontend.cat.show', 'hair-care') }}">
                                        Shop Now
                                    </a>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>



            </div>

        </div>
    </section>


    <!-- F Promo Box of the Page -->
    <section class="pb-0 mb-0 service-box-bg">
        <aside class="f-promo-box dark">
            <div class="container divider">
                <div class="row row-cols-2 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 ">
                    <div class="col mt-paddingbottomsm ft-svg-class-1">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-sub-class-1">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/free-shipping.svg') }}"
                                    alt="">

                            </span>
                            <div class="txt-holder  ft-svg-child-2">
                                <h1 class="f-promo-box-heading">FREE SHIPPING</h1>
                                <p>Free shipping on all US order</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page end -->
                    </div>
                    <div class="col mt-paddingbottomsm ft-svg-class-2">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-sub-class-2">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/support.svg') }}"
                                    alt="">
                            </span>
                            <div class="txt-holder ft-svg-child-2">
                                <h1 class="f-promo-box-heading">SUPPORT 24/7</h1>
                                <p>We support 24 hours a day</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page -->
                    </div>
                    <div class="col mt-paddingbottomxs ft-svg-class-3">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-sub-class-3">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/gift-card.svg') }}"
                                    alt="">
                            </span>
                            <div class="txt-holder ft-svg-child-2">
                                <h1 class="f-promo-box-heading">GIFT CARDS</h1>
                                <p>Give perfect gift</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page -->
                    </div>
                    <div class="col">
                        <!-- F Widget Item of the Page -->
                        <div class="f-widget-item ft-svg-class-4">
                            <span class="widget-icon ft-svg-child-1">
                                <img src="{{ asset('frontend/images/products/footer-icon/payment.svg') }}"
                                    alt="">
                            </span>
                            <div class="txt-holder ft-svg-child-2">
                                <h1 class="f-promo-box-heading">PAYMENT 100% SECURE</h1>
                                <p>Payment 100% secure</p>
                            </div>
                        </div>
                        <!-- F Widget Item of the Page -->
                    </div>
                </div>
            </div>
        </aside>
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
