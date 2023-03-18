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

    <section>
        <div class="container">
            <div class="row py-5 d-flex justify-content-center">
                <div class="col-12 col-lg-6 ">
                    <form class="p-5 profile-form-border" action="" method="post">
                        <h5 class="main-head text-red">Personal Information</h5>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="First Name">
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="Mobile">
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="Email">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 py-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1" checked placeholder="male">
                                <label class="form-check-label profile-f-l-color" for="exampleRadios1">
                                    Male
                                </label>
                            </div>


                            <div class="col-sm-6 py-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1" checked>
                                <label class="form-check-label profile-f-l-color" for="exampleRadios1">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 pt-4 text-end">
                            <button type="submit" class="btn profile-btn-color">Update profile</button>
                        </div>

                    </form>
                    <div class="py-4">
                    </div>
                    <form class="p-5 profile-form-border" action="" method="post">
                        <h5 class="main-head text-red">Change Password</h5>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="Current Password">
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                           <img src="frontend/images/organic-product/change-p-pic.png"  class="img-fluid" alt="" style="width: 255px;"
                          >
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome" placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="col-sm-12 pt-4 pt-lg-0  text-end">
                            <button type="submit" class="btn profile-btn-color">Update password</button>
                        </div>


                    </form>
                </div>



                <div class="col-12 col-lg-4 py-5 py-lg-0 py-xl-0 py-xxl-0">
                    <form class="p-5 profile-form-border ">

                        <h5 class="main-head text-red">Address</h5>

                        <div class="form-group profile-form-group-star-name py-2">
                            <input type="text" class="profile-form-input-custome" placeholder="Name*">

                        </div>


                        <div class="form-group  profile-form-group-star-pin-code py-2">
                            <input type="text" class="profile-form-input-custome" placeholder="Pin Code*">
                        </div>

                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="Enter name">
                        </div>

                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="Address*">
                        </div>

                        <div class="pt-5 pb-3">
                            <hr class="m-0">
                        </div>



                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="Landmark">
                        </div>

                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="City">
                        </div>

                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="State">
                        </div>

                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="Country">
                        </div>

                        <div class="form-group py-2">
                            <input type="text" class=" profile-form-input-custome" placeholder="Mobile No*">

                        </div>



                        <div class="row">
                            <div class="col-sm-6 py-2">

                                <label for="" class="profile-f-l-color"> Address Type</label>

                            </div>
                            <div class="col-sm-6 py-2 profile-form-label-color">
                                <select class="form-select-lg mb-3 profile-form-input-custome profile-f-l-color profile-box-s" aria-label=".form-select-lg example">
                                  <option selected class="profile-f-l-color border-0">Home</option>
                                  <option value="1" class="profile-f-l-color">Office</option>
                                  <option value="2" class="profile-f-l-color">Other</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12 pt-4">
                            <button type="submit" class="btn profile-btn-color">Save</button>
                        </div>

                    </form>


                    <div class="row">
                        <div class="col-sm-12 py-5 text-center">
                            <button type="submit" class="btn profile-btn-color">
                                + Add address
                            </button>
                        </div>

                    </div>



                </div>
            </div>
        </div>


    </section>

    {{-- we will move this styles in css file before production --}}

    <style>
 .profile-btn-color {
            background: rgba(236, 38, 143, 1);
            color: #fff;

        }
.profile-btn-color:hover {
    color:#FFFFFF;
    background-color:rgba(236, 38, 143, 1);;
    border-color: rgba(236, 38, 143, 1);;
}
  .profile-box-s {
        font-size: 18px;
        color: #1c87c9;
        background-color: #FFFFFF;
        border-radius: 5px;
        box-shadow: 0px 3.19365px 3.19365px rgba(0, 0, 0, 0.25);
      }


        .profile-f-l-color {
            color: rgba(57, 53, 53, 0.34);
        }

        .profile-form-border {
            border: 0.798412px solid #000000;
            border-radius: 11.9762px;
        }

        .profile-form-group-star-name {
            position: relative;
        }

        .profile-form-group-star-name::after {
            content: '*';
            position: absolute;
            top: 14px;
            left: 50px;
            color: rgba(241, 0, 0, 0.7);
        }

        .profile-form-group-star-pin-code {
            position: relative;
        }

        .profile-form-group-star-pin-code::after {
            content: '*';
            position: absolute;
            top: 14px;
            left: 72px;
            color: rgba(241, 0, 0, 0.7);
        }


        .profile-form-input-custome {
            display: block;
            width: 100%;
            padding: 0.5rem 0rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            border-top: none;
            border-right: none;
            border-left: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        }

        .profile-form-input-custome::placeholder {
            text-align: left;
            color: rgba(57, 53, 53, 0.34);
        }

        .profile-form-input-custome:focus {
            outline: none;
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        }


        .checkbox-custome-p {}

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
