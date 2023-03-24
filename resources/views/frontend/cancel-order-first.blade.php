@extends('frontend.layouts.app')
@section('title', 'Cancel Orders first |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')


<section style="padding: 100px 0px 100px 0px">
    <div class="container">
        <div class="row d-flex justify-content-center gap-3">
            <div class="col-lg-12 col-xl-5">
                <div class="p-4 order-return-first-main">
                    <form action="" method="post">
                        <div class="order-return-first-search">
                            <h6 class="main-head py-3 or-first-card-color">What is the issue with the item?</h6>
                            <select class="form-select or-first-card-select" aria-label="Default select example" style="">
                                <option selected>Choose a Response</option>
                                <option value="1">Order created by mistake</option>
                                <option value="2">Items would not arrive on time</option>
                                <option value="3">Shipping cost too high</option>
                                <option value="4">Found cheaper somewhere else</option>
                                <option value="5">Others</option>
                            </select>
                        </div>

                        <div class="py-4 order-return-first-cmnt">
                            <h6 class="main-head py-3 or-first-card-color">Comments (optional):</h6>
                            <div  class="d-block d-sm-flex justify-content-between align-items-center">
                                <input type="text" class="form-control" placeholder="Add comment"
                                aria-label="Input field" aria-describedby="basic-addon2" style="width: 200px">
                                <button type="submit" class="btn bg-orange or-firstpage-lbtn my-3 my-sm-0">Submit Request</button>

                            </div>

                        </div>
                    </form>
                </div>

            </div>

            <div class="col-lg-12 col-xl-6 or-firstpage-scard">
                <div class="p-4 or-firstpage-scard">

                        <h6 class="main-head py-3 or-firstpage-scard-fhead">What is the issue with the item?</h6>
                        <div class="row pt-3 pb-3 or-firstpage-scard-card">
                            <div class="col-sm-4 or-firstpage-scard-card-img" style="">
                                <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-sm-8 or-firstpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
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
                        <button type="button" class="btn bg-orange or-firstpage-lbtn mt-4">Continue Shopping</button>
                </div>
            </div>
        </div>
   </div>
</section>



@endsection
