@extends('frontend.layouts.app')
@section('title', 'Profile')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="{{ $user->first_name }}" />

    <section>
        <div class="container">
            <div class="row py-5 d-flex justify-content-center">
                <div class="col-12 col-lg-6 ">
                    <form class="p-4 profile-form-border" action="{{ route('frontend.profile.update') }}" method="post">
                        <h5 class="main-head text-red">Personal Information</h5>
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="first_name" class=" profile-form-input-custome"
                                    placeholder="First Name" minlength="3" maxlength="30"
                                    value="{{ old('first_name') ?? $user->first_name }}" required>
                                @if ($errors->has('first_name'))
                                    <div id="first_name-error" class="text-primary">{{ $errors->first('first_name') }}</div>
                                @endif
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="text" name="last_name" class=" profile-form-input-custome"
                                    placeholder="Last Name" minlength="3" maxlength="30" required
                                    value="{{ old('last_name') ?? $user->last_name }}">
                                @if ($errors->has('last_name'))
                                    <div id="last_name-error" class="text-primary">{{ $errors->first('last_name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 py-2">
                                <input type="text" name="phone" class=" profile-form-input-custome"
                                    placeholder="Mobile" required minlength="10" maxlength="10"
                                    value="{{ old('phone') ?? $user->phone }}" disabled>
                                @if ($errors->has('phone'))
                                    <div id="phone-error" class="text-primary">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" name="email" class=" profile-form-input-custome" placeholder="Email"
                                    minlength="5" maxlength="50" value="{{ old('email') ?? $user->email }}">
                                @if ($errors->has('email'))
                                    <div id="email-error" class="text-primary">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6 py-2">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                    value="male" @if ($user->gender == 'male') {{ 'checked' }} @endif
                                    placeholder="male" required>
                                <label class="form-check-label profile-f-l-color" for="exampleRadios1">
                                    Male
                                </label>
                            </div>


                            <div class="col-sm-6 py-2">
                                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1"
                                    value="female" @if ($user->gender == 'female') {{ 'checked' }} @endif required>
                                <label class="form-check-label profile-f-l-color" for="exampleRadios1">
                                    Female
                                </label>
                            </div>
                            @if ($errors->has('gender'))
                                <div id="gender-error" class="text-primary">{{ $errors->first('gender') }}</div>
                            @endif
                        </div>
                        <div class="col-sm-12 pt-4 text-end">
                            <button type="submit" class="btn profile-btn-color">Update profile</button>
                        </div>

                    </form>
                    <div class="py-3">
                    </div>
                    {{-- <form class="p-4 profile-form-border" action="" method="post">
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
                                <img src="frontend/images/organic-product/change-p-pic.png" class="img-fluid" alt=""
                                    style="width: 255px;">
                            </div>

                            <div class="col-sm-6 py-2">
                                <input type="text" class=" profile-form-input-custome"
                                    placeholder="Confirm New Password">
                            </div>

                        </div>

                        <div class="col-sm-12 pt-4 pt-lg-0  text-end">
                            <button type="submit" class="btn profile-btn-color">Update password</button>
                        </div>


                    </form> --}}
                </div>

                <div class="col-12 col-lg-4 py-5 py-lg-0 py-xl-0 py-xxl-0">

                    @forelse($userAddresses->get() as $key => $userAddress)
                        <div class="profile-form-border p-4 mb-3">
                            <div class="row display: flex; align-items: center">
                                <div class="col-6 py-2">
                                    <h5 class="main-head text-red">Address {{ $key + 1 }}</h5>
                                </div>
                                <div class="col-6 py-2">
                                    <ul class="d-flex gap-4 list-unstyled justify-content-end">
                                        @if ($userAddress->type == 'primary')
                                            <li>
                                                <button type="button"
                                                    class="btn btn-primary position-relative profile-s-bg-color">
                                                    {{ ucfirst($userAddress->type) }}
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                        <i class="fas fa-check" style="color:white"></i>
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </button>
                                            </li>
                                        @endif
                                        @if ($userAddress->type != 'primary')
                                            <li>
                                                <a href="">
                                                    <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <h6 class="main-head">{{ $userAddress->name }}</h6>
                                    <span>{{ $userAddress->street_address }} <br>
                                        {{ $userAddress->city }}
                                        {{ $userAddress->state }} <br>
                                        {{ $userAddress->country }} - {{ $userAddress->postal_code }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    @if ($userAddresses->count() < 3)
                        <div class="p-4 profile-form-border ">
                            <form class="" action="{{ route('frontend.address.update') }}" method="post">
                                @csrf
                                <h5 class="main-head text-red">Add Address</h5>

                                <div class="form-group py-2">
                                    <input type="text" name="name" class=" profile-form-input-custome"
                                        placeholder="Name*" required minlength="3" maxlength="20" required>
                                    @if ($errors->has('name'))
                                        <div id="name-error" class="text-primary">
                                            {{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group py-2">
                                    <input type="text" name="street_address" class=" profile-form-input-custome"
                                        placeholder="Street Address*" required minlength="5" maxlength="80" required>
                                    @if ($errors->has('street_address'))
                                        <div id="street_address-error" class="text-primary">
                                            {{ $errors->first('street_address') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="city" class=" profile-form-input-custome"
                                        placeholder="City" minlength="3" maxlength="20" required>
                                    @if ($errors->has('city'))
                                        <div id="city-error" class="text-primary">{{ $errors->first('city') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="state" class=" profile-form-input-custome"
                                        placeholder="State" minlength="3" maxlength="50" required>
                                    @if ($errors->has('state'))
                                        <div id="state-error" class="text-primary">{{ $errors->first('state') }}</div>
                                    @endif
                                </div>

                                <div class="form-group py-2">
                                    <input type="text" name="country" class=" profile-form-input-custome"
                                        placeholder="Country" minlength="3" maxlength="50" required>
                                    @if ($errors->has('country'))
                                        <div id="country-error" class="text-primary">{{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group  profile-form-group-star-pin-code py-2">
                                    <input type="text" name="postal_code" class="profile-form-input-custome"
                                        placeholder="Pin Code*" minlength="3" maxlength="20" required>
                                    @if ($errors->has('postal_code'))
                                        <div id="postal_code-error" class="text-primary">
                                            {{ $errors->first('postal_code') }}
                                        </div>
                                    @endif
                                </div>

                                {{-- <div class="row">
                                <div class="col-sm-6 py-2">

                                    <label for="" class="profile-f-l-color"> Address Type</label>

                                </div>
                                <div class="col-sm-6 py-2 profile-form-label-color">
                                    <select class="form-select-lg mb-3 profile-form-input-custome profile-f-l-color"
                                        aria-label=".form-select-lg example">
                                        <option selected class="profile-f-l-color border-0">Home</option>
                                        <option value="1" class="profile-f-l-color">Office</option>
                                        <option value="2" class="profile-f-l-color">Other</option>
                                    </select>
                                </div>
                            </div> --}}


                                <div class="col-sm-12 pt-4">
                                    <button type="submit" class="btn profile-btn-color">Save</button>
                                </div>

                            </form>
                        </div>
                    @endif
                    {{-- <div class="row">
                        <div class="col-sm-12 py-5 text-center">
                            <button type="submit" class="btn profile-btn-color">
                                + Add Address
                            </button>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>


    </section>
@endsection
