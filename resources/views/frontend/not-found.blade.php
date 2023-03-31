@extends('frontend.layouts.app')
@section('title', 'Order Tracking First |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection

@section('content')

    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />


    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex flex-column align-items-center not-found">
                        <img src="frontend/images/not-found/not-fond.png" alt="" class="img-fluid"
                            style="width:500px">
                        <div class="not-found-desc">Currently there are no item in whishlist</div>
                        <a href="javascript:void(0)" class="btn btn-orange or-secondpage-lbtn mt-4 ">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
