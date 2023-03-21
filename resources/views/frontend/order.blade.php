@extends('frontend.layouts.app')
@section('title', 'Order |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <section class="profile-breadcrumb">
        <div class="bg-stipe"></div>
        <div class="container">

            <div class="profile">
                <div class="profile-photo-section">
                    <img src="https://via.placeholder.com/300" class="profile-photo" alt="">
                    <button class="btn edit-photo-btn">
                        <img src="{{ url('frontend/images/icons/icon-camera.svg') }}" alt="">
                    </button>
                </div>
                <form action="" class="user-name-section">
                    <div class="input-group">
                        <input type="text" class="form-control name-input" value="User name">
                        <button class="btn input-group-append">
                            <img src="{{ url('frontend/images/icons/icon-edit.svg') }}" alt="">
                        </button>
                    </div>
                </form>
            </div>
            <div class="profile-menu">

                <a href="javascript:;" class="btn">
                    <span class="menu-icon">
                        <img src="{{ url('frontend/images/icons/icon-user.svg') }}" alt="">
                    </span>
                    My Profile
                </a>
                <a href="javascript:;" class="btn">
                    <span class="menu-icon">
                        <img src="{{ url('frontend/images/icons/icon-user.svg') }}" alt="">
                    </span>
                    My Wishlist
                </a>
                <a href="javascript:;" class="btn">
                    <span class="menu-icon">
                        <img src="{{ url('frontend/images/icons/icon-user.svg') }}" alt="">
                    </span>
                    My Orders
                </a>
                <a href="javascript:;" class="btn">
                    <span class="menu-icon">
                        <img src="{{ url('frontend/images/icons/icon-user.svg') }}" alt="">
                    </span>
                    Reviews
                </a>
                <a href="javascript:;" class="btn">
                    <span class="menu-icon">
                        <img src="{{ url('frontend/images/icons/icon-user.svg') }}" alt="">
                    </span>
                    Payment
                </a>

            </div>
        </div>


    </section>

    <section style="padding:30px 0px 50px 0px">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="col-lg-9 col-xl-4 col-xxl-5">
                    <div class="input-group py-3">
                        <input type="text" class="form-control" placeholder="" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2" style="background-color: rgba(236, 38, 143, 0.4);">
                            <i class="fas fa-search fa-fw text-red"></i>
                        </span>
                    </div>
                </div>

                <div class="col-lg-9 col-xl-6 col-xxl-5 order-main">
                        <ul class="list-unstyled order-main-li-section" >
                        <li class="cmc wishlist-order" style="border-bottom: 4px solid rgba(0, 175, 239, 1);">
                            My Order
                        </li>
                        <li class="cmc wishlist-ship">
                            Not Yet Shipped
                        </li>
                        <li class="cmc wishlist-buy">
                            Buy Again
                        </li>
                        <li class="cmc can-ord">
                            Cancelled Orders
                        </li>
                        </ul>
                </div>

            </div>

            <div class="row py-4">
                <div class="d-flex justify-content-center my-order-main">
                    <div class="col-sm-10  my-order-main-out">
                        <div class="row  my-order-main-in">
                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column my-order-main-in-img">
                                <img src="frontend/images/products/skin/sk1.png" class="img-fluid" alt="">
                            </div>
                            <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6  my-order-main-desc">

                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p style="font-size: 14px;opacity: 0.6;">essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....</p>

                                <ul class="list-unstyled d-flex gap-3 flex-column flex-lg-row">
                                   <li>
                                    <ul class="gap-2 d-flex flex-row flex-lg-column  gap-lg-0" style="padding: 0px 0px 0px 17px;">
                                        <li>Expected Delivery</li>
                                        <li>19 March 2023</li>
                                    </ul>


                                   </li>
                                    <li class="status">
                                        <ul class="gap-4 d-flex flex-row flex-lg-column  gap-lg-0">
                                            <li class="return-order">Return Order</li>
                                            <li class="cancel-order">Cancel Order</li>
                                        </ul>
                                    </li>
                                    <li class="price">From ₹ 145.55</li>

                                </ul>

                            </div>
                            <div class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0  my-order-main-in-btn gap-2">
                                <a href="http://" class="arriving-or-btn">Arriving Wednesday</a>
                                <button type="submit" class="btn  add-track-btn">Track Order</button>
                                <button type="submit" class="btn  add-orderDetails-btn">Order Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
@endsection

