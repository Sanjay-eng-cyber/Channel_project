@extends('frontend.layouts.app')
@section('title', 'Buy Again |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section style="padding: 100px 0px 100px 0px">
        <div class="container">
            <div class="row d-flex justify-content-center gap-3">
                <div class="col-lg-12 col-xl-5">

                </div>

                <div class="col-lg-12 col-xl-6 or-secondpage-scard">
                    <div class="p-4 or-secondpage-scard">

                            <h5 class="main-head py-3 or-secondpage-scard-fhead">Recommended based on your purchase</h5>
                            <div class="row pt-3 pb-3 or-secondpage-scard-card">
                                <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                                    <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
                                    <h4 class="main-head">Essence Long Lasting Eye Pencil</h4>
                                    <p>
                                        essence Long Lasting Eye Pencil is a creamy and pigmented eye pencil that brightens
                                        and
                                        accentuates your eye more....
                                    </p>
                                    <ul class="d-flex gap-5 p-0">
                                        <li class="no-bullet fw-bolder">
                                            From ₹145.55
                                        </li>
                                        <li>13 March 2023</li>
                                    </ul>
                                </div>

                            </div>
                            <button type="button" class="btn bg-orange or-secondpage-lbtn mt-4">Continue Shopping</button>
                    </div>
                </div>
            </div>
       </div>
    </section>
@endsection


