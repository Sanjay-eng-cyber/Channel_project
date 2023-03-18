@extends('frontend.layouts.app')
@section('title', 'Profile')
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


@endsection
