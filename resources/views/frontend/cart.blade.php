@extends('frontend.layouts.app')
@section('title', 'Cart |')
@section('cdn')

    <style>
        @media screen and (max-width:768px) {
            .__cart-ui-img-in {
                padding-right: 28px;
            }
        }

        @media screen and (max-width: 480px) {
            .__cart-ui-card .__cart-ui-close-btn {
                position: absolute;
                top: -13px;
                padding: 15px;
                right: -86%;
            }
        }
    </style>
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </section>

    @if ($cartItems)
        <section style="padding:40px 0px 65px 0px">
            <div class="container">
                <h5 class="h5 main-head text-center text-red my-3">Your Paynent Method</h5>
                <div class="row d-flex flex-column-reverse flex-md-row">
                    <div class="col-md-8 col-lg-9 __cart-ui-f">

                        <div class="row d-flex justify-content-center justify-content-lg-end __cart-ui-nav">
                            <div class="col-sm-12 px-0">
                                <h5 class="main-head __cart-ui-nav-heading">Deselect all items</h5>
                                <div
                                    class="d-flex cc-border justify-content-between p-3 justify-content-between __cart-ui-nav-des">
                                    <div class="fw-bold">Product</div>
                                    <ul class="d-flex gap-5 list-unstyled p-0 m-0">
                                        <li class="fw-bold">Price</li>
                                        <li class="fw-bold">Quantity</li>
                                        <li class="fw-bold">Total</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        @forelse ($cartItems as $c)
                                <div class="row cc-border my-3 __cart-ui-card" style="padding:15px">
                                    <a href="{{route('frontend.cart.delete', $c->id)}}">
                                        <div class="__cart-ui-close-btn"><button type="button" class="btn-close"
                                                aria-label="Close"></button>
                                    </a>
                                </div>
                                <div class=" col-md-4 col-lg-3">
                                    <div class="d-flex align-items-center justify-content-center gap-1 __cart-ui-img-in">
                                        <div class="form-check">
                                            <input class="form-check-input ck-wallet-fi" type="checkbox" name="gender"
                                                id="male" value="male" checked="">
                                        </div>
                                        <img src="https://via.placeholder.com/180x180" class="img-fluid img-border"
                                            alt="">
                                    </div>
                                </div>

                                <div class="col-md-8 col-lg-4  justify-content-md-start justify-content-center mt-3 mt-md-0 d-flex align-items-center">
                                    <div class="">
                                        <h5 class="main-head">{{ $c->product->name }}</h5>
                                        <p class="p-0 __cart-ui-pra">
                                            {{ $c->product->short_descriptions }}
                                        </p>

                                    </div>
                                </div>

                                <div
                                    class="col-md-12 col-lg-5 d-flex justify-content-center align-items-center justify-content-between flex-row flex-lg-column flex-xl-row my-3 my-lg-0">
                                    <ul class="p-0 m-0">
                                        <li class="no-bullet "><s class="text-muted">{{ $c->product->mrp }}</s></li>
                                        <li class="no-bullet  "><strong>{{ $c->product->final_price }}</strong></li>
                                        @if ($c->product->stock)
                                            <li class="no-bullet text-green">In Stock</li>
                                        @endif
                                    </ul>
                                    <div class="input-group align-items-center" style="width:124px;">
                                        <span class="input-group-text">-</span>
                                        <input type="number" id="qty" class="form-control text-center"
                                            value="1">
                                        <span class="input-group-text">+</span>
                                    </div>

                                    <div class="d-none d-md-inline">
                                        ₹145.55
                                    </div>


                                </div>
                            </div>
                        @empty
                        @endforelse

                        <div class="pagination d-flex justify-content-center py-2">
                                <ul class="pagination text-center">
                                    {{ $cartItems->appends(Request::all())->links('pagination::bootstrap-4') }}
                                </ul>
                        </div>

                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="" style="padding: 50px 15px 15px 15px">
                            <h5 class="main-head">Order Summary</h5>
                            <hr style="border-bottom: 2px solid #000000;">
                            <div class="d-flex justify-content-between my-3">
                                <strong>Sub Total</strong>
                                <strong> {{ $subTotal }}</strong>
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

                            <p class="m-0 p-0 my-2 __cart-ui-pra text-capitalize">coupon code will apply on checkout page
                            </p>

                            <div class="d-flex justify-content-between my-3">
                                <strong>Total:</strong>
                                <strong>{{ $subTotal }}</strong>
                            </div>
                            <hr>
                            <p class="m-0 p-0 my-2 __cart-ui-pra text-capitalize">coupon code will apply on checkout page
                            </p>

                            <div>
                                <a href="http://" class="my-2 text-white">
                                    <button type="button" class="btn btn-outline-pink-hover w-100 p-1 p-xl-2">
                                        Proceed To Checkout
                                    </button>
                                </a>

                                <a href="http://" class="my-2 text-white">
                                    <button type="button" class="btn btn-orange-outline-hover w-100 my-2  p-1 p-xl-2">
                                        Proceed To Checkout
                                    </button>
                                </a>
                            </div>


                        </div>

                    </div>
                </div>


            </div>

        </section>
    @else
        @include('frontend.not-found')
    @endif

@endsection
