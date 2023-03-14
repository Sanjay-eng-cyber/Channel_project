@extends('frontend.layouts.app')
@section('title')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- banner frame start here -->
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
                            <div class="card-body mt-0" style="background-color:#FB8CA5;padding:15px 20px 15px 20px;border-radius:0px 0px 26.6782px 26.6782px">
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
                            <img src="frontend/images/banner/ix3.jpg" class="card-img-top" alt="..." style="border-radius: 26.6782px 26.6782px 0px 0px;">
                            <div class="card-body mt-0" style="background-color:#F1D2AD;padding:8px 10px 8px 10px;border-radius:0px 0px 26.6782px 26.6782px">
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
                            <img src="frontend/images/banner/ix4.jpg" class="card-img-top" alt="..." style="border-radius: 26.6782px 26.6782px 0px 0px;">
                            <div class="card-body mt-0" style="background-color:#EBB579;padding:8px 10px 8px 10px;border-radius:0px 0px 26.6782px 26.6782px">
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
                   {{-- skin slider --}}
                <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
                    <!-- producttabs start here -->
                    <ul class="producttabs">
                        <li><a href="#tab1" class="active">Skin Care</a></li>
                        <li><a href="#tab2">Latest</a></li>
                        <li><a href="#tab3">Best Seller</a></li>
                    </ul>
                    <!-- producttabs end here -->
                    <div class="tab-content">

                        <div id="tab1">
                            <!-- tabs slider start here -->
                            <div class="tabs-sliderlg">
                            @for ($i = 1; $i < 7; $i++)

                                <!-- slide start here -->
                                <div class="slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-skin-product1">
                                        <div class="box skin-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/skin/sk2.png"
                                                            alt="image description"></a>

                                                    <ul class="links product-desc">
                                                        <h4 class="card-title m-0 text-center">
                                                            <strong class="text-center" style="color:black">
                                                             Love Your Hair
                                                            </strong>
                                                           </h4>
                                                           <p class="card-text text-center pra" style="color:black">
                                                            treat yourself with the best
                                                             <h5 class="text-center">

                                                                <a href="#" class="p-0" style="color:black">
                                                                        Shop More
                                                                        <i class="fa fa-angle-right"></i>
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

                        <div id="tab2">
                            <!-- tabs slider start here -->
                            <div class="tabs-sliderlg">
                            @for ($i = 1; $i < 6; $i++)

                                <!-- slide start here -->
                                <div class="slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-skin-product1">
                                        <div class="box skin-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/skin/sk1.png"
                                                            alt="image description"></a>

                                                    <ul class="links product-desc">
                                                        <h4 class="card-title m-0 text-center">
                                                            <strong class="text-center" style="color:black">
                                                             Love Your Hair
                                                            </strong>
                                                           </h4>
                                                           <p class="card-text text-center pra" style="color:black">
                                                            treat yourself with the best
                                                           </p>
                                                             <h5 class="text-center">

                                                                <a href="#" class="p-0" style="color:black">
                                                                        Shop More
                                                                        <i class="fa fa-angle-right"></i>
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


                        <div id="tab3">
                            <!-- tabs slider start here -->
                            <div class="tabs-sliderlg">
                            @for ($i = 1; $i < 6; $i++)

                                <!-- slide start here -->
                                <div class="slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-skin-product1">
                                        <div class="box skin-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/skin/sk2.png"
                                                            alt="image description"></a>

                                                    <ul class="links product-desc">
                                                        <h4 class="card-title m-0 text-center">
                                                            <strong class="text-center" style="color:black">
                                                             Love Your Hair
                                                            </strong>
                                                           </h4>
                                                           <p class="card-text text-center pra" style="color:black">
                                                            treat yourself with the best
                                                           </p>
                                                             <h5 class="text-center">

                                                                <a href="#" class="p-0" style="color:black">
                                                                        Shop More
                                                                        <i class="fa fa-angle-right"></i>
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
                </div><!-- mt producttabs end here -->

                   {{-- FRAGRANCES slider --}}
                <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
                    <!-- producttabs start here -->
                    <ul class="producttabs">
                        <li><a href="#tab21" class="active">Fragrances</a></li>
                        <li><a href="#tab22">Latest</a></li>
                        <li><a href="#tab23">Best Seller</a></li>
                    </ul>
                    <!-- producttabs end here -->
                    <div class="tab-content">

                        <div id="tab21">
                            <!-- tabs slider start here -->
                            <div class="fragrances">
                            @for ($i = 1; $i < 6; $i++)

                                <!-- slide start here -->
                                <div class="slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-fragrances">
                                        <div class="box fragrances-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/fragrances/fg.png"
                                                            class="img-slider" alt="image description"></a>

                                                    <ul class="links product-desc">
                                                        <h4 class="card-title m-0 text-center">
                                                            <strong class="text-center" style="color:black">
                                                             Love Your Hair
                                                            </strong>
                                                           </h4>
                                                           <p class="card-text text-center" style="color:black">
                                                            treat yourself with the best
                                                           </p>
                                                             <h5 class="text-center">

                                                                <a href="#" class="p-0" style="color:black">
                                                                        Shop More
                                                                        <i class="fa fa-angle-right"></i>
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

                        <div id="tab22">
                            <!-- tabs slider start here -->
                            <div class="fragrances">
                            @for ($i = 1; $i < 6; $i++)

                                <!-- slide start here -->
                                <div class="slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-fragrances">
                                        <div class="box fragrances-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/fragrances/fg.png"
                                                            class="img-slider" alt="image description"></a>

                                                    <ul class="links product-desc">
                                                        <h4 class="card-title m-0 text-center">
                                                            <strong class="text-center" style="color:black">
                                                             Love Your Hair
                                                            </strong>
                                                           </h4>
                                                           <p class="card-text text-center" style="color:black">
                                                            treat yourself with the best
                                                           </p>
                                                             <h5 class="text-center">

                                                                <a href="#" class="p-0" style="color:black">
                                                                        Shop More
                                                                        <i class="fa fa-angle-right"></i>
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


                        <div id="tab23">
                            <!-- tabs slider start here -->
                            <div class="fragrances">
                            @for ($i = 1; $i < 6; $i++)

                                <!-- slide start here -->
                                <div class="slide">
                                    <!-- mt product1 large start here -->
                                    <div class="mt-product1 large mt-fragrances">
                                        <div class="box fragrances-box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="{{route('products.show','product-name')}}"><img
                                                            src="frontend/images/products/fragrances/fg.png"
                                                            class="img-slider" alt="image description"></a>

                                                    <ul class="links product-desc">
                                                        <h4 class="card-title m-0 text-center">
                                                            <strong class="text-center" style="color:black">
                                                             Love Your Hair
                                                            </strong>
                                                           </h4>
                                                           <p class="card-text text-center" style="color:black">
                                                            treat yourself with the best
                                                           </p>
                                                             <h5 class="text-center">

                                                                <a href="#" class="p-0" style="color:black">
                                                                        Shop More
                                                                        <i class="fa fa-angle-right"></i>
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
                <!-- mt producttabs end here -->






            </div>
        </div>
    </div>



{{-- home decor slider --}}
  <section>
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="home-decor-wrapper">
                    <div class="home-decor-slider">
                        <div>
                          <img src="frontend/images/products/home-decor/hd-1.png" alt="home-decor-image">
                        </div>
                        <div>
                            <img src="frontend/images/products/home-decor/hd-1.png" alt="home-decor-image">
                        </div>
                        <div>
                            <img src="frontend/images/products/home-decor/hd-1.png" alt="home-decor-image">
                        </div>
                        <div>
                            <img src="frontend/images/products/home-decor/hd-1.png" alt="home-decor-image">
                        </div>
                        <div>
                            <img src="frontend/images/products/home-decor/hd-1.png" alt="home-decor-image">
                        </div>
                        <div>
                            <img src="frontend/images/products/home-decor/hd-1.png" alt="home-decor-image">
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
  </section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">

            </div>
            <div class="col-lg-6 col-md-12">
            </div>
        </div>
    </div>
</section>

    {{-- <a id="newsletter-hiddenlink" href="#popup2" class="lightbox" style="display: none;">NEWSLETTER</a>

	<div class="popup-holder">

		<div id="popup1" class="lightbox">

			<section class="mt-product-detial">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">

							<div class="slider">

								<ul class="list-unstyled comment-list">
									<li><a href="#"><i class="fa fa-heart"></i>27</a></li>
									<li><a href="#"><i class="fa fa-comments"></i>12</a></li>
									<li><a href="#"><i class="fa fa-share-alt"></i>14</a></li>
								</ul>

								<div class="product-slider">
									<div class="slide">
										<img src="frontend/images/img03.jpg" alt="image descrption">
									</div>
									<div class="slide">
										<img src="frontend/images/img03.jpg" alt="image descrption">
									</div>
									<div class="slide">
										<img src="frontend/images/img03.jpg" alt="image descrption">
									</div>
									<div class="slide">
										<img src="frontend/images/img03.jpg" alt="image descrption">
									</div>
								</div>

								<ul class="list-unstyled slick-slider pagg-slider">
									<li><img src="frontend/images/img03.jpg" alt="image description"></li>
									<li><img src="frontend/images/img03.jpg" alt="image description"></li>
									<li><img src="frontend/images/img03.jpg" alt="image description"></li>
									<li><img src="frontend/images/img03.jpg" alt="image description"></li>
									<li><img src="frontend/images/img03.jpg" alt="image description"></li>
									<li><img src="frontend/images/img03.jpg" alt="image description"></li>
								</ul>
							</div>
							<div class="detial-holder">

								<ul class="list-unstyled breadcrumbs">
									<li><a href="#">Chairs <i class="fa fa-angle-right"></i></a></li>
									<li>Products</li>
								</ul>

								<h2>KAILA FABRIC CHAIR</h2>

								<div class="rank-rating">
									<ul class="list-unstyled rating-list">
										<li><a href="#"><i class="fa fa-star"></i></a></li>
										<li><a href="#"><i class="fa fa-star"></i></a></li>
										<li><a href="#"><i class="fa fa-star"></i></a></li>
										<li><a href="#"><i class="fa fa-star-o"></i></a></li>
									</ul>
									<span class="total-price">Reviews (12)</span>
								</div>
								<ul class="list-unstyled list">
									<li><a href="#"><i class="fa fa-share-alt"></i>SHARE</a></li>
									<li><a href="#"><i class="fa fa-exchange"></i>COMPARE</a></li>
									<li><a href="#"><i class="fa fa-heart"></i>ADD TO WISHLIST</a></li>
								</ul>
								<div class="txt-wrap">
									<p>Koila is a chair designed for restaurants and food lovers in general. Designed in
										collaboration with restaurant professionals, it ensures comfort and an ideal
										posture, as there are armrests on both sides of the chair.</p>
									<p>Koila is a seat designed for restaurants and gastronomic places in general.
										Designed in collaboration with professional of restaurants and hotels field,
										this armchair is composed of a curved shell with a base in oak who has pinched
										the back upholstered in fabric or leather. It provides comfort and holds for
										ideal sitting position,the arms may rest on the sides ofthe armchair.</p>
								</div>
								<div class="text-holder">
									<span class="price">$ 79.00 <del>399,00</del></span>
								</div><!-- Product Form of the Page -->
								<form action="#" method="post" class="product-form">
                                    @csrf
									<fieldset>
										<div class="row-val">
											<label for="qty">qty</label>
											<select id="clr">
												<option>1</option>
											</select>
										</div>
										<div class="row-val">
											<button type="submit">ADD TO CART</button>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div id="popup2" class="lightbox">
			<section class="mt-newsletter-popup">
				<span class="title">NEWSLETTER</span>
				<div class="holder">
					<div class="txt-holder">
						<h1>JOIN OUR NEWSLETTER</h1>
						<span class="txt">Subscribe now to get <b>15%</b> off on any product!</span>

						<form action="#" method="post" class="newsletter-form">
                            @csrf
							<fieldset>
								<input type="email" class="form-control" placeholder="Enter your e-mail">
								<button type="submit">SUBSCRIBE</button>
							</fieldset>
						</form>
					</div>
					<div class="img-holder">
						<img src="frontend/images/img02.png" alt="image description">
					</div>
				</div>
				<form action="#" method="post" class="popup-form">
                    @csrf
					<fieldset>
						<input type="checkbox" class="form-control">Don’t show this popup again
					</fieldset>
				</form>
			</section>
		</div>
	</div> --}}
@endsection
