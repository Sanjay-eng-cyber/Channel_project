@extends('frontend.layouts.app')
@section('title', 'Buy Again |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section style="padding: 100px 0px 100px 0px">
        <div class="container">
            <div class="row ">

                <div class="col-lg-12 col-xl-6">


                    <div class="p-4  or-secondpage-fcard">

                        <div class="or-secondpage-fcard-top">
                            <h5 class="main-head or-secondpage-fcard-head" style="">Issue with the item?</h5>

                            <div>product damaged but shipping box ok </div>
                            <div>image uploaded</div>
                        </div>
                        <div class="d-flex flex-column justify-content-end or-secondpage-fcard-bottom">
                            <button type="button" class="btn  mb-1 or-sp-first-btn">Request Summited</button>
                            <button type="button" class="btn  mt-2 or-sp-second-btn">Cancel</button>
                        </div>

                    </div>


                    <div class="p-4 my-4 or-secondpage-fscard">
                            <div class="gap-2 or-secondpage-fs-top">
                                    <div class="or-secondpage-fscard-top">
                                        <h5 class="main-head  or-secondpage-fscard-head d-none d-md-block" style="">How can we make it right?</h5>

                                        <h5 class="main-head  or-secondpage-fscard-head pt-3 pb-1">Talk to customer service </h5>
                                        <p class="pr-2">
                                            Explain the issues with items<br />
                                            Get instant resolution upon verification on issues
                                        </p>
                                    </div>
                                    <div class="or-secondpage-fscard-imgTop">
                                        <h5 class="main-head  or-secondpage-fscard-head d-block d-md-none" style="">How can we make it right?</h5>
                                        <img src="frontend/images/order-img/or-2.png" alt="" class="img-fluid">
                                    </div>
                            </div>

                            <div class=" or-secondpage-fscard-bottom">
                                <button type="button" class="btn  mb-1 bg-orange">
                                    <i class="fas fa-phone"></i>
                                    Call Me
                                </button>
                            </div>
                    </div>



                    <div class="p-4 my-4 or-secondpage-fscard">
                        <div class="gap-2 or-secondpage-fs-top">
                                <div class="or-secondpage-fscard-top">
                                    <h5 class="main-head  or-secondpage-fscard-head d-none d-md-block" style="">How can we make it right?</h5>

                                    <h5 class="main-head  or-secondpage-fscard-head pt-3 pb-1">Talk to customer service </h5>
                                    <p class="pr-2">
                                        Explain the issues with items<br />
                                        Get instant resolution upon verification on issues
                                    </p>
                                </div>
                                <div class="or-secondpage-fscard-imgTop">
                                    <h5 class="main-head  or-secondpage-fscard-head d-block d-md-none" style="">How can we make it right?</h5>
                                    <img src="frontend/images/order-img/or-3.png" alt="" class="img-fluid">
                                </div>
                        </div>

                        <div class=" or-secondpage-fscard-bottom">
                            <label for="">your number</label>
                            <input type="text" class="form-control mt-2" id="exampleInput" placeholder="Enter text">

                        </div>
                    </div>





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





