@extends('frontend.layouts.app')
@section('title')
@section('content')

    {{-- first slider slider --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- banner frame start here -->
                    <h2 class="text-red main-head pt-4 pb-3">#Bestseller of channel</h2>

                    <div class="banner-frame toppadding-zero">
                        <!-- banner 5 white start here -->
                        <div class="banner-5 white wow fadeInLeft" data-wow-delay="0.6s">
                            <img src="frontend/images/banner/ix1.png" alt="image description">
                            <div class="holder">
                                <div class="texts">
                                    <strong class="title"></strong>
                                    <h3><strong></strong> Collection</h3>
                                    <p>Consectetur adipisicing elit. Beatae accusamus, optio, repellendus
                                        inventore</p>
                                    <span class="price-add">₹ 79.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- banner 5 white end here -->
                        <!-- banner 6 white start here -->
                        <div class="banner-6 white wow fadeInRight banner-custome" data-wow-delay="0.6s">
                            <div class="card" style="">
                                <img src="frontend/images/banner/ix2.png" class="card-img-top m-0" alt="...">
                                <div class="card-body mt-0"
                                    style="background-color:#FB8CA5;padding:15px 20px 15px 20px;border-radius:0px 0px 26.6782px 26.6782px">
                                    <h3 class="card-title m-0 text-center">
                                        <strong class="text-center" style="color:black">
                                            Love Your Hair
                                        </strong>
                                    </h3>
                                    <p class="card-text text-center" style="color:black">
                                        treat yourself with the best in haircare
                                    </p>
                                    <h4 class="text-center">

                                        <a href="#" class="" style="color:black">
                                            Shop More
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </h4>
                                </div>
                            </div>

                        </div><!-- banner 5 white end here -->
                        <!-- banner box two start here -->
                        <div class="banner-box two">
                            <!-- banner 7 right start here -->
                            <div class="banner-7 right wow fadeInUp  banner-custome" data-wow-delay="0.6s">
                                <div class="card" style="">
                                    <img src="frontend/images/banner/ix3.jpg" class="card-img-top" alt="..."
                                        style="border-radius: 26.6782px 26.6782px 0px 0px;">
                                    <div class="card-body mt-0"
                                        style="background-color:#F1D2AD;padding:8px 10px 8px 10px;border-radius:0px 0px 26.6782px 26.6782px">
                                        <h3 class="card-title m-0 text-center">
                                            <strong class="text-center" style="color:black">
                                                Luxe Fragrances
                                            </strong>
                                        </h3>
                                        <p class="card-text text-center" style="color:black">
                                            indulge in premium perfumes
                                        </p>
                                        <h4 class="text-center">

                                            <a href="#" class="" style="color:black">
                                                Shop More
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                            </div>

                            <!-- banner 8 start here -->
                            <div class="banner-8 wow fadeInDown " data-wow-delay="0.6s">


                                <div class="card" style="">
                                    <img src="frontend/images/banner/ix4.jpg" class="card-img-top" alt="..."
                                        style="border-radius: 26.6782px 26.6782px 0px 0px;">
                                    <div class="card-body mt-0"
                                        style="background-color:#EBB579;padding:8px 10px 8px 10px;border-radius:0px 0px 26.6782px 26.6782px">
                                        <h3 class="card-title m-0 text-center">
                                            <strong class="text-center" style="color:black">
                                                Home Decor
                                            </strong>
                                        </h3>
                                        <p class="card-text text-center" style="color:black">
                                            My love language
                                        </p>
                                        <h4 class="text-center">

                                            <a href="#" class="" style="color:black">
                                                Shop More
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                            </div>

                            <!-- banner 8 start here -->
                        </div>
                    </div><!-- banner frame end here -->
                    <!-- banner frame start here -->

                </div>
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
                            <li><a href="#skincare" class="active">Skin Care</a></li>
                            <li><a href="#skinlatest">Latest</a></li>
                            <li><a href="#skinbestseller">Best Seller</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        <div id="skincare">
                            <!-- tabs slider start here -->
                            <div class="skin-sliderlg">
                            @for ($i = 1; $i < 7; $i++)

                                <!-- slide start here -->
                                <div class="slide  skin-slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-skin-product1">
                                        <div class="box skin-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/skin/sk2.png"
                                                            alt="image description"></a>

                                                            <ul class="links skin-text-desc py-2 px-3">
                                                                <div class="card-title  m-0 text-center pro-head ">
                                                                    <h4 class=""> Zara Best Perfumes</h4>
                                                                </div>
                                                                   <p class="card-text text-center">
                                                                    treat yourself with the best in skincare
                                                                   </p>


                                                                   <button type="button" class="btn btn-light sk-btn">
                                                                  <a href="" class="p-0  text-black">
                                                                    Shop Nov
                                                                  </a>
                                                                  </button>


                                                               </a>
                                                            </ul>

                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- mt product1 center end here -->
                                </div>

                            @endfor
                            </div>
                            <!-- tabs slider end here -->
                        </div>

                        <div id="skinlatest">
                            <!-- tabs slider start here -->
                            <div class="skin-sliderlg">
                                @for ($i = 1; $i < 7; $i++)
                                    <!-- slide start here -->
                                    <div class="slide skin-slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large mt-skin-product1">
                                            <div class="box skin-box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="{{ route('products.show', 'product-name') }}"><img
                                                                src="frontend/images/products/skin/sk1.png"
                                                                alt="image description"></a>

                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head ">
                                                                        <h4 class=""> Zara Best Perfumes</h4>
                                                                    </div>
                                                                       <p class="card-text text-center">
                                                                        treat yourself with the best in skincare
                                                                       </p>


                                                                       <button type="button" class="btn btn-light sk-btn">
                                                                      <a href="" class="p-0  text-black">
                                                                        Shop Nov
                                                                      </a>
                                                                      </button>


                                                                   </a>
                                                                </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- mt product1 center end here -->
                                    </div>
                                @endfor
                            </div>
                            <!-- tabs slider end here -->
                        </div>


                        <div id="skinbestseller">
                            <!-- tabs slider start here -->
                            <div class="skin-sliderlg">
                                @for ($i = 1; $i < 7; $i++)
                                    <!-- slide start here -->
                                    <div class="slide skin-slide">
                                        <!-- mt product1 large start here -->
                                        <div class="mt-product1 large mt-skin-product1">
                                            <div class="box skin-box">
                                                <div class="b1">
                                                    <div class="b2">
                                                        <a href="{{ route('products.show', 'product-name') }}"><img
                                                                src="frontend/images/products/skin/sk2.png"
                                                                alt="image description"></a>

                                                                <ul class="links skin-text-desc py-2 px-3">
                                                                    <div class="card-title  m-0 text-center pro-head ">
                                                                        <h4 class=""> Zara Best Perfumes</h4>
                                                                    </div>
                                                                       <p class="card-text text-center">
                                                                        treat yourself with the best in skincare
                                                                       </p>


                                                                       <button type="button" class="btn btn-light sk-btn">
                                                                      <a href="" class="p-0  text-black">
                                                                        Shop Nov
                                                                      </a>
                                                                      </button>


                                                                   </a>
                                                                </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- mt product1 center end here -->
                                    </div>
                                @endfor
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
                            <li><a href="#fragrances" class="active">Fragrances</a></li>
                            <li><a href="#fragranceslatest">Latest</a></li>
                            <li><a href="#fragrancesbestseller">Best Seller</a></li>
                        </ul>

                        <div class="tab-content">

                            <div id="fragrances">
                                <!-- tabs slider start here -->
                                <div class="fragrances">
                                    @for ($i = 1; $i < 6; $i++)
                                        <!-- slide start here -->
                                        <div class="slide fragrances-slide">
                                            <!-- mt product1 large start here -->
                                            <div class="mt-product1 large mt-fragrances ">
                                                <div class="box fragrances-box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('products.show', 'product-name') }}"><img
                                                                    src="frontend/images/products/fragrances/fg.png"
                                                                    class="img-slider" alt="image description"></a>

                                                            <ul class="links fragrances-text-desc">
                                                                <div
                                                                    class="card-title card-text-heading m-0 text-center pro-head ">
                                                                    Zara BEST PERFUMES
                                                                </div>
                                                                <p class="card-text text-center">
                                                                    treat yourself with the best
                                                                </p>
                                                                <h5 class="text-center">
                                                                    <a href="#" class="p-0 main-head text-black">
                                                                        Shop Nov
                                                                    </a>

                                                                </h5>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- mt product1 center end here -->
                                        </div>
                                    @endfor
                                </div>
                                <!-- tabs slider end here -->
                            </div>

                            <div id="fragranceslatest">
                                <!-- tabs slider start here -->
                                <div class="fragrances ">
                                    @for ($i = 1; $i < 6; $i++)
                                        <!-- slide start here -->
                                        <div class="slide fragrances-slide">
                                            <!-- mt product1 large start here -->
                                            <div class="mt-product1 large mt-fragrances">
                                                <div class="box fragrances-box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('products.show', 'product-name') }}"><img
                                                                    src="frontend/images/products/fragrances/fg.png"
                                                                    class="img-slider" alt="image description"></a>

                                                            <ul class="links fragrances-text-desc">
                                                                <div
                                                                    class="card-title card-text-heading m-0 text-center pro-head ">
                                                                    Zara BEST PERFUMES
                                                                </div>
                                                                <p class="card-text text-center">
                                                                    treat yourself with the best
                                                                </p>
                                                                <h5 class="text-center">
                                                                    <a href="#" class="p-0 main-head text-black">
                                                                        Shop Nov
                                                                    </a>

                                                                </h5>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- mt product1 center end here -->
                                        </div>
                                    @endfor
                                </div>
                                <!-- tabs slider end here -->
                            </div>

                            <div id="fragrancesbestseller">
                                <!-- tabs slider start here -->
                                <div class="fragrances">
                                    @for ($i = 1; $i < 6; $i++)
                                        <!-- slide start here -->
                                        <div class="slide fragrances-slide">
                                            <!-- mt product1 large start here -->
                                            <div class="mt-product1 large mt-fragrances">
                                                <div class="box fragrances-box">
                                                    <div class="b1">
                                                        <div class="b2">
                                                            <a href="{{ route('products.show', 'product-name') }}"><img
                                                                    src="frontend/images/products/fragrances/fg.png"
                                                                    class="img-slider" alt="image description"></a>

                                                            <ul class="links fragrances-text-desc">
                                                                <div
                                                                    class="card-title card-text-heading m-0 text-center pro-head ">
                                                                    Zara BEST PERFUMES
                                                                </div>
                                                                <p class="card-text text-center">
                                                                    treat yourself with the best
                                                                </p>
                                                                <h5 class="text-center">
                                                                    <a href="#" class="p-0 main-head text-black">
                                                                        Shop Nov
                                                                    </a>

                                                                </h5>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- mt product1 center end here -->
                                        </div>
                                    @endfor
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
            <h2 class="text-orange text-center">
                Transform your living space into a cozy
                <br> sanctuary with unique <span class="text-pink"> home decor</span> accents
            </h2>

            <div class="rise-up-slider">
                @for ($i = 0; $i < 5; $i++)
                    <div class="rise-up-slider-card">
                        <img class="product" src="{{ url('frontend/images/chair.png') }}" alt="">
                        <div class="text ">
                            <div>
                                <h4>
                                    handmade work chair
                                </h4>
                                ₹2,707 <s class="text-muted">₹4,509</s>
                            </div>
                            <div>
                                <button type="button" class="like-btn btn">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>
    </section>

  <!-- F Promo Box of the Page -->
<section>
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
                        <img src="{{ asset('frontend/images/products/footer-icon/support.svg') }}" alt="">
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
                        <img src="{{ asset('frontend/images/products/footer-icon/payment.svg') }}" alt="">
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
@endsection
