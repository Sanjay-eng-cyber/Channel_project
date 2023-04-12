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
                <li class="breadcrumb-item bread-crum" aria-current="page">My Wishlist  </li>
            </ol>
            </nav>
        </div>
    </section>

    <section style="padding:0px 0px 50px 0px">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <h4 class="main-head text-red text-center py-3">Wishes Do Come True </h4>
                <div class="col-sm-9">
                    <form action="" method="post">
                        <div class="input-group py-3">
                            <input type="text" class="form-control" placeholder="" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                                <button type="submit" class="search-icon-dd" >
                                      <i class="fas fa-search fa-fw text-red"></i>
                                </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row py-4">
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

                                    <a href="" style="font-size:12px" class="py-1 text-red">
                                        Remove item from Wishlist
                                    </a>

                                {{-- <a href="http://">Remove item from Wishlist</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row py-4">
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

                                <a href="" style="font-size:12px" class="py-1 text-red">
                                        Remove item from Wishlist
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @include('frontend.not-found')

@endsection

