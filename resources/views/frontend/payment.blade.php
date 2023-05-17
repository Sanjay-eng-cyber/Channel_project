@extends('frontend.layouts.app')
@section('title', 'Payment |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Payment</li>
                </ol>
            </nav>
        </div>
    </section>
    <section style="padding:0px 0px 50px 0px">
        <div class="container">
            <div class="row d-flex justify-content-center">

                <h2 class="text-center text-red">Your Payment Method</h2>



                <div class="col-md-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item border ">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    <span class="span-w-90-per">Cash On Delivery</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                                    body.</div>
                            </div>
                        </div>
                        <div class="accordion-item border mt-2">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    <span class="span-w-90-per"> UPI Payments</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                    body. Let's imagine this being filled with some actual content.</div>
                            </div>
                        </div>
                        <div class="accordion-item border mt-2">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    <span class="span-w-90-per"> Net Banking</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                                    body. Nothing more exciting happening here in terms of content, but just filling up the
                                    space to make it look, at least at first glance, a bit more representative of how this
                                    would look in a real-world application.</div>
                            </div>
                        </div>

                        <div class="accordion-item border mt-2">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                                    aria-controls="flush-collapseFour">
                                    <span class="span-w-90-per"> Credit / Debit Card</span> <img
                                        src="{{ url('frontend/images/icons/green-check.png') }}" alt=""
                                        class="img-w-20">
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                                    body. Let's imagine this being filled with some actual content.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        </div>
    </section>

    {{-- @include('frontend.not-found') --}}

@endsection
