@extends('frontend.layouts.app')
@section('title', 'Wishlist |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />
    <section class="mt-3">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">My Wishlist </li>
                </ol>
            </nav>
        </div>
    </section>

    <section style="padding:0px 0px 50px 0px">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <h4 class="main-head text-red text-center py-2">Wishes Do Come True </h4>
                <div class="col-sm-9">
                    <form action="" method="post">
                        <div class="input-group py-1">
                            <input type="text" class="form-control serch-border" placeholder=""
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <button type="submit" class="search-icon-dd serch-border">
                                <i class="fas fa-search fa-fw text-red"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            @forelse($wishlists as $w)
                <div class="row py-3">
                    <div class="d-flex justify-content-center wishlist-main">
                        <div class="col-sm-8 wishlist-main-out">
                            <div class="row wishlist-main-in">
                                <div
                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                                    <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                                    <h5 class="main-head">{{ $w->product->name }}</h5>
                                    <p style="font-size: 14px;opacity: 0.6;">{{ $w->product->short_descriptions }}</p>

                                    <ul class="list-unstyled d-flex gap-3">
                                        <li class="price">From ₹ {{ $w->product->final_price }}</li>
                                        @if ($w->product->stock)
                                            <li class="status">In Stock</li>
                                        @endif
                                    </ul>

                                </div>
                                <div
                                    class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn">
                                    <a href="javascript:void(0)"
                                        class="add-to-cart-btn btn profile-btn-color add-p-btn btn-pink add-to-cart"
                                        data-p-id="{{ $w->product->id }}">Add To
                                        Cart</a>
                                    <a href="" style="font-size:12px" class="py-1 text-red" data-bs-toggle="modal"
                                        data-bs-target="#wishlist-popup">
                                        Remove item from Wishlist
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                @include('frontend.not-found')
            @endforelse

            {{-- <div class="row py-3">
                <div class="d-flex justify-content-center wishlist-main">
                    <div class="col-sm-8 wishlist-main-out">
                        <div class="row wishlist-main-in">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                                <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....</p>

                                <ul class="list-unstyled d-flex gap-3">
                                    <li class="price" >From ₹ 145.55</li>
                                    <li class="status">In Stock</li>
                                </ul>

                            </div>
                            <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn"
                              >
                                <a href="http://">
                                    <button type="button" class="btn profile-btn-color add-p-btn">Add To Cart</button>

                                </a>

                                    <a href="" style="font-size:12px" class="py-1 text-red" data-bs-toggle="modal" data-bs-target="#wishlist-popup">
                                        Remove item from Wishlist
                                    </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- <div class="row py-3">
                <div class="d-flex justify-content-center wishlist-main">
                    <div class="col-sm-8 wishlist-main-out">
                        <div class="row wishlist-main-in">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column wishlist-main-in-img">
                                <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6 wishlist-main-desc">

                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....</p>

                                <ul class="list-unstyled d-flex gap-3">
                                    <li class="price" >From ₹ 145.55</li>
                                    <li class="status">In Stock</li>
                                </ul>

                            </div>
                            <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0 wishlist-main-in-btn">
                                <a href="http://">
                                    <button type="button" class="btn btn-outline-danger add-pd-btn">
                                        <i class="fas fa-check text-red"></i>
                                        Added
                                    </button>
                                </a>

                                <a href="" style="font-size:12px" class="py-1 text-red" data-bs-toggle="modal" data-bs-target="#wishlist-popup">
                                        Remove item from Wishlist
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>






    <div class="modal fade auth-popup" id="wishlist-popup" tabindex="-1" aria-labelledby="loginPopupLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-body" style="overflow:hidden;">
                    <button class="auth-popup-close-button mb-4" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <img src="{{ url('frontend/images/icons/icon-close.svg') }}" style="width: 51px;" alt="">
                    </button>

                    <div class="auth-popup-body" v-if="!requested">
                        <img src="{{ asset('frontend/images/popup/review-show.png') }}" class="img-fluid m-auto"
                            alt="" srcset="" style="width:210px">
                        <h4 class="dispaly-6 main-head text-black mt-3 mb-2">Are You Sure!</h4>
                        <div class="d-flex justify-content-evenly my-4">
                            <button type="button" class="btn btn-lightpink px-4 btn-lg">Yes</button>
                            <button type="button" class="btn btn-pink px-4 btn-lg">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
