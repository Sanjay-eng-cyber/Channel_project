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


                <div class="col-lg-9 col-xl-3 col-xxl-4">
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
        </div>
    </section>
@endsection

