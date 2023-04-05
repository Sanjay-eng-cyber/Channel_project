@extends('frontend.layouts.app')
@section('title', 'Wishlist |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
<style>
    .shop-cart-grid{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }
</style>
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section>
        <div class="container">
            <div class="row">
              <div class="col-sm-9">
                    <div>
                        <div class="row">
                            <div class="col-sm-11 mx-auto">
                               <div class="d-flex cc-border justify-content-between p-2">
                                <div>Product</div>
                                    <div>
                                        <ul class="d-flex gap-4 list-unstyled">
                                            <li>Price</li>
                                            <li>Quantity</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="row cc-border my-5" style="padding:15px">
                        <div class=" col-md-4 col-lg-3">
                            <div class="d-flex align-items-center justify-content-center gap-1 ">
                                        <div class="form-check">
                                            <input class="form-check-input ck-wallet-fi" type="checkbox" name="gender" id="male" value="male" checked="">
                                        </div>
                                        <img src="https://via.placeholder.com/180x180" class="img-fluid img-border" alt="" >
                            </div>
                        </div>

                        <div class="col-md-8 col-lg-4   mt-3 mt-md-0 d-flex align-items-center">
                            <div class="">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p style="font-size: 12.9268px; color:rgba(0, 0, 0, 0.7); p-0">
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
              <div class="col-sm-3">
                    <div>
                        <h5 class="main-head">Order summary</h5>

                        <div class="d-flex gap-3">
                            <div>sub total</div>
                            <div> ₹145.55</div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter coupon code" aria-label="Coupon code" aria-describedby="coupon-button">
                            {{-- <button class="btn btn-primary" type="button" id="coupon-button">Apply</button> --}}

                        </div>
                        <p class="m-0 p-0" style="font-size:12px;color:rgba(0, 0, 0, 0.7)">coupon code will apply on checkout page</p>

                    </div>

              </div>
            </div>
        </div>

    </section>

    @include('frontend.not-found')

@endsection
