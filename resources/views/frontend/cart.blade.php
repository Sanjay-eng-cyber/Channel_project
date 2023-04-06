@extends('frontend.layouts.app')
@section('title', 'Wishlist |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section style="padding:40px 0px 65px 0px">
        <div class="container">
            <h5 class="h5 main-head text-center text-red my-3">Your Paynent Method</h5>
            <div class="row">
                <div class="col-md-8 col-lg-9 __cart-ui-f">

                    <div class="row d-flex justify-content-end __cart-ui-nav">
                        <div class="col-sm-11">
                            <h5 class="main-head __cart-ui-nav-heading">Deselect all items</h5>
                            <div
                                class="d-flex cc-border justify-content-between p-3 justify-content-between __cart-ui-nav-des">
                                <div class="fw-bold">Product</div>
                                <ul class="d-flex gap-4 list-unstyled p-0 m-0">
                                    <li class="fw-bold">Price</li>
                                    <li class="fw-bold">Quantity</li>
                                    <li class="fw-bold">Total</li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="row cc-border my-3 __cart-ui-card" style="padding:15px">
                        <div class="__cart-ui-close-btn"><button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class=" col-md-4 col-lg-3">
                            <div class="d-flex align-items-center justify-content-center gap-1 ">
                                <div class="form-check">
                                    <input class="form-check-input ck-wallet-fi" type="checkbox" name="gender"
                                        id="male" value="male" checked="">
                                </div>
                                <img src="https://via.placeholder.com/180x180" class="img-fluid img-border" alt="">
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-4   mt-3 mt-md-0 d-flex align-items-center">
                            <div class="">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p class="p-0 __cart-ui-pra">
                                    essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....
                                </p>

                            </div>
                        </div>

                        <div class="col-md-12 col-lg-5 d-flex justify-content-center align-items-center justify-content-between flex-row flex-lg-column flex-xl-row my-3 my-lg-0">
                            <ul class="p-0 m-0">
                                <li class="no-bullet "><s class="text-muted">From ₹145.55</s></li>
                                <li class="no-bullet  "><strong>From ₹145.55</strong></li>
                                <li class="no-bullet text-green">In Stock</li>
                            </ul>
                            <div class="input-group align-items-center" style="width:124px;">
                                <span class="input-group-text">-</span>
                                <input type="number" id="qty" class="form-control text-center" value="1">
                                <span class="input-group-text">+</span>
                            </div>

                            <div>
                                ₹145.55
                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="" style="padding: 50px 15px 15px 15px">
                        <h5 class="main-head" >Order summary</h5>
                        <hr style="border-bottom: 2px solid #000000;">
                        <div class="d-flex justify-content-between my-3">
                            <strong>Sub Total</strong>
                            <strong> ₹145.55</strong>
                        </div>
                        <hr>

                        <div class="my-2">
                            <form action="" method="post">
                                <label for="coupon-code-input my-3">Coupon</label>

                                <div class="input-group my-2">
                                    <input type="text" class="form-control" id="coupon-code-input"
                                        placeholder="Enter coupon code" aria-label="Coupon code"
                                        aria-describedby="coupon-button">
                                </div>
                            </form>
                        </div>

                        <p class="m-0 p-0 my-2 __cart-ui-pra">coupon code will apply on checkout page</p>

                        <div class="d-flex justify-content-between my-3">
                            <strong>Total:</strong>
                            <strong> ₹145.55</strong>
                        </div>
                        <hr>
                        <p class="m-0 p-0 my-2 __cart-ui-pra">coupon code will apply on checkout page</p>


                        <a href="http://" class="my-2 text-white">
                            <button type="button" class="btn btn-pink w-100">
                                Proceed To Checkout
                            </button>
                        </a>

                        <a href="http://" class="my-2 text-white">
                            <button type="button" class="btn btn-orange w-100 my-2">
                                Proceed To Checkout
                            </button>
                        </a>

                    </div>

                </div>
            </div>


        </div>

    </section>

    @include('frontend.not-found')

@endsection
