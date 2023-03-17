@extends('frontend.layouts.app')
@section('title', 'Profile')
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


    {{-- we will move this styles in css file before production --}}

    <style>
        .profile-breadcrumb {
            position: relative;
            margin-top: 1em;
            margin-bottom: 1em;
        }

        .profile-breadcrumb .container {
            z-index: 9;
            position: relative;
        }

        .profile-breadcrumb .bg-stipe {
            background: #EC268F99;
            position: absolute;
            width: 100%;
            height: 70%;
            top: 30%;
            left: 0;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            z-index: 0;

        }


        .profile-photo-section {
            max-width: 250px;
            position: relative;
            margin: auto;
        }

        .profile-photo {
            border: 5px solid #EC268F;
            border-radius: 30em
        }

        .edit-photo-btn {
            position: absolute;
            bottom: 1em;
            right: 1em;
            width: 4em;
            height: 4em;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: .3em;
            border-radius: 5em;
            background: #D9D9D9;
        }

        .edit-photo-btn:hover {
            background: #fff;
        }

        .profile {
            margin-bottom: 1em
        }

        .user-name-section {
            max-width: 45ch;
            margin: auto;
        }

        .name-input {
            background: none;
            border: none;
            border-bottom: 4px solid rgba(0, 0, 0, 0.1);
            color: white;
            font-weight: 500;
            font-size: 28px;
            text-align: center;
        }

        .profile-menu {
            display: flex;
            justify-content: center;
            align-items: flex-end;
            flex-wrap: wrap;
            background: #FFFFFF;
            box-shadow: 8px 8px 12px rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .profile-menu a.btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            border: none;
        }

        .menu-icon {
            width: 5em;
            height: 5em;
            border-radius: 10em;
            padding: 1.2em;
            margin-bottom: 0.2em;
            background: #FFFFFF;
            box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.52);
            transition: box-shadow 1s;
        }

        .profile-menu a.btn:hover .menu-icon {
            box-shadow: -2px -8px 16px 0px rgba(0, 0, 0, 0.52);
        }
    </style>
@endsection
