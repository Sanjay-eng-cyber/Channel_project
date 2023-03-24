@extends('frontend.layouts.app')
@section('title', 'About-Us |')
@section('content')

    <main id="mt-main">
        <!-- Mt Product detial of the Page -->
        <section class="mt-product-detial wow fadeInUp mt-4 " data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Slider of the Page -->
                        <div class="slider">
                            <div class="product-slider">
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                                <div class="slide">
                                    <img src="https://via.placeholder.com/600" alt="image description">
                                </div>
                            </div>

                            <ul class="list-unstyled slick-slider pagg-slider">
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>
                                <li>
                                    <div class="img">
                                        <img src="https://via.placeholder.com/600" alt="image description">
                                    </div>
                                </li>

                            </ul>
                            <!-- Pagg Slider of the Page end -->
                        </div>
                        <!-- Slider of the Page end -->
                        <!-- detial Holder of the Page -->
                        <div class="detial-holder">
                            <h1 class="h3 font-body">
                                essence Long Lasting Eye Pencil
                            </h1>
                            <hr>
                            <p class="text-muted">
                                essence Long Lasting Eye Pencil is a creamy and pigmented eye pencil that brightens and
                                accentuates your eyes. It is easy to apply and provides a smooth feel thanks to its
                                formulation. It is time to get creative with this retractable and long-lasting eye pencil!
                            </p>
                            <h3 class="h5 font-body">
                                From ₹145.55
                            </h3>
                            <h4 class="font-body h5 text-green">
                                <i class="fa-regular fa-circle-check"></i> in stock
                            </h4>
                            <form action="">
                                <label for="color-option">
                                    Select a color * :
                                </label>
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select" name="color-option" id="color-option" id="">
                                            <option value="choose an option" disabled selected> choose an option
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="qty-counter">
                                            <label for="qty">
                                                qty
                                            </label>
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">-</span>
                                                <input type="number" id="qty" class="form-control" value="1">
                                                <span class="input-group-text">+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around my-3">
                                        <button class="btn btn-primary btn-pink">
                                            add to cart
                                        </button>

                                        <button class="btn btn-primary btn-black">
                                            buy now
                                        </button>

                                        <a class="btn text-red">

                                            <i class="fa-regular fa-heart"></i>
                                            add to Wishlist
                                        </a>
                                    </div>
                                    <h6 class="h5 font-body">
                                        Main Ingredients
                                    </h6>
                                    <ul class="ms-3 text-muted">
                                        <li>
                                            Tocopherol, also known as vitamin E, contributes to eyelash development;
                                        </li>
                                        <li>
                                            Cyclopentasiloxane is a silicone that provides a smooth feel and comfortable
                                            wear;
                                        </li>
                                        <li>
                                            Lecithin moisturizes and protects the skin.
                                        </li>
                                    </ul>
                                    <h6 class="h5 font-body">
                                        How to use
                                    </h6>
                                    <p class="text-muted">
                                        Apply essence Long Lasting Eye Pencil directly to the lash and waterline of the eye.
                                    </p>
                                </div>
                            </form>
                            <div class="rating-holder">
                                <div class="row">
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating">
                                            <div class="d-flex align-items-center">
                                                <h6 class="h5 font-body mb-0 me-3">
                                                    Ratings
                                                </h6>
                                                <div class="five-stars text-green d-flex">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="rating-total d-flex align-items-center me-3">
                                                    <h6 class="h2 text-muted font-body mb-0">
                                                        4.3
                                                    </h6>
                                                    <i class="fa-solid fa-star text-green"></i>
                                                </div>
                                                <div class="rating-count text-muted">
                                                    based on Verified Buyers 1k
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating-stats text-muted">
                                            <div class="rating-stat">
                                                <div>
                                                    5
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    4
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 80%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    3
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    2
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 40%;"></div>
                                                </div>
                                            </div>
                                            <div class="rating-stat">
                                                <div>
                                                    1
                                                </div>
                                                <div class="review-bar">
                                                    <div class="review-bar-value" style="width: 20%;"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- detial Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product detial of the Page end -->
        <div class="product-detial-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="mt-tabs text-center text-uppercase">
                            <li><a href="#tab1">DESCRIPTION</a></li>
                            <li><a href="#tab2">INFORMATION</a></li>
                            <li><a href="#tab3" class="active">REVIEWS (12)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1">
                                <p>Koila is a chair designed for restaurants and food lovers in general.
                                    Designed in collaboration with restaurant professionals, it ensures comfort
                                    and an ideal posture, as there are armrests on both sides of the chair. </p>
                                <p>Koila is a seat designed for restaurants and gastronomic places in general.
                                    Designed in collaboration with professional of restaurants and hotels field,
                                    this armchair is composed of a curved shell with a base in oak who has
                                    pinched the back upholstered in fabric or leather. It provides comfort and
                                    holds for ideal sitting position,the arms may rest on the sides ofthe
                                    armchair. <br>Solid oak construction.<br> Back in plywood (2 faces oak
                                    veneer) or upholstered in fabric, leather or eco-leather.<br> Seat
                                    upholstered in fabric, leather or eco-leather. <br> H 830 x L 585 x P 540
                                    mm.</p>
                            </div>
                            <div id="tab2">
                                <p>Koila is a chair designed for restaurants and food lovers in general.
                                    Designed in collaboration with restaurant professionals, it ensures comfort
                                    and an ideal posture, as there are armrests on both sides of the chair. </p>
                                <p>Koila is a seat designed for restaurants and gastronomic places in general.
                                    Designed in collaboration with professional of restaurants and hotels field,
                                    this armchair is composed of a curved shell with a base in oak who has
                                    pinched the back upholstered in fabric or leather. It provides comfort and
                                    holds for ideal sitting position,the arms may rest on the sides ofthe
                                    armchair. <br>Solid oak construction.<br> Back in plywood (2 faces oak
                                    veneer) or upholstered in fabric, leather or eco-leather.<br> Seat
                                    upholstered in fabric, leather or eco-leather. <br> H 830 x L 585 x P 540
                                    mm.</p>
                            </div>
                            <div id="tab3">
                                <div class="product-comment">
                                    <div class="mt-box">
                                        <div class="mt-hold">
                                            <ul class="mt-star">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span class="name">John Wick</span>
                                            <time datetime="2016-01-01">09:10 Nov, 19 2016</time>
                                        </div>
                                        <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                            sse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non</p>
                                    </div>
                                    <div class="mt-box">
                                        <div class="mt-hold">
                                            <ul class="mt-star">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                            <span class="name">John Wick</span>
                                            <time datetime="2016-01-01">09:10 Nov, 19 2016</time>
                                        </div>
                                        <p>Usmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat. Duis aute irure dolor in
                                            reprehenderit in voluptate velit sse cillum dolore eu fugiat nulla
                                            pariatur. Excepteur sint occaecat cupidatat non</p>
                                    </div>
                                    <form action="#" class="p-commentform">
                                        <fieldset>
                                            <h2>Add Comment</h2>
                                            <div class="mt-row">
                                                <label>Rating</label>
                                                <ul class="mt-star">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                            <div class="mt-row">
                                                <label>Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mt-row">
                                                <label>E-Mail</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mt-row">
                                                <label>Review</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                            <button type="submit" class="btn-type4">ADD REVIEW</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- related products start here -->
        <div class="related-products wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>RELATED PRODUCTS</h2>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- mt product1 center start here -->
                                <div class="mt-product1 mt-paddingbottom20">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <a href="product-detial.html"><img
                                                        src="{{ asset('frontend/images/products/img01.jpg') }}"
                                                        alt="image description"></a>
                                                <span class="caption">
                                                    <span class="new">NEW</span>
                                                </span>
                                                <ul class="mt-stars">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="links">
                                                    <li><a href="#"><i class="icon-handbag"></i><span>Add to
                                                                Cart</span></a></li>
                                                    <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a href="product-detial.html">Puff
                                                Chair</a></strong>
                                        <span class="price"><i class="fa fa-eur"></i> <span>287,00</span></span>
                                    </div>
                                </div><!-- mt product1 center end here -->
                                <!-- mt product1 center start here -->
                                <div class="mt-product1 mt-paddingbottom20">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <a href="product-detial.html"><img
                                                        src="{{ asset('frontend/images/products/img02.jpg') }}"
                                                        alt="image description"></a>
                                                <ul class="links">
                                                    <li><a href="#"><i class="icon-handbag"></i><span>Add to
                                                                Cart</span></a></li>
                                                    <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a href="product-detial.html">Bombi
                                                Chair</a></strong>
                                        <span class="price"><i class="fa fa-eur"></i> <span>399,00</span></span>
                                    </div>
                                </div><!-- mt product1 center end here -->
                                <!-- mt product1 center start here -->
                                <div class="mt-product1 mt-paddingbottom20">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <a href="product-detial.html"><img
                                                        src="{{ asset('frontend/images/products/img03.jpg') }}"
                                                        alt="image description"></a>
                                                <ul class="links">
                                                    <li><a href="#"><i class="icon-handbag"></i><span>Add to
                                                                Cart</span></a></li>
                                                    <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a href="product-detial.html">Wood
                                                Chair</a></strong>
                                        <span class="price"><i class="fa fa-eur"></i> <span>198,00</span></span>
                                    </div>
                                </div><!-- mt product1 center end here -->
                                <!-- mt product1 center start here -->
                                <div class="mt-product1 mt-paddingbottom20">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <a href="product-detial.html"><img
                                                        src="{{ asset('frontend/images/products/img04.jpg') }}"
                                                        alt="image description"></a>
                                                <span class="caption">
                                                    <span class="off">15% Off</span>
                                                    <span class="new">NEW</span>
                                                </span>
                                                <ul class="mt-stars">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                </ul>
                                                <ul class="links">
                                                    <li><a href="#"><i class="icon-handbag"></i><span>Add to
                                                                Cart</span></a></li>
                                                    <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a href="product-detial.html">Bombi
                                                Chair</a></strong>
                                        <span class="price"><i class="fa fa-eur"></i> <span>200,00</span></span>
                                    </div>
                                </div><!-- mt product1 center end here -->
                                <!-- mt product1 center start here -->
                                <div class="mt-product1 mt-paddingbottom20">
                                    <div class="box">
                                        <div class="b1">
                                            <div class="b2">
                                                <a href="product-detial.html"><img
                                                        src="{{ asset('frontend/images/products/img05.jpg') }}"
                                                        alt="image description"></a>
                                                <ul class="links">
                                                    <li><a href="#"><i class="icon-handbag"></i><span>Add to
                                                                Cart</span></a></li>
                                                    <li><a href="#"><i class="icomoon icon-heart-empty"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="icomoon icon-exchange"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="txt">
                                        <strong class="title"><a href="product-detial.html">Bombi
                                                Chair</a></strong>
                                        <span class="price"><i class="fa fa-eur"></i> <span>200,00</span></span>
                                    </div>
                                </div><!-- mt product1 center end here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- related products end here -->
        </div>
    </main><!-- mt main end here -->


@endsection
