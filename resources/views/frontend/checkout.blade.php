@extends('frontend.layouts.app')
@section('title', 'About-Us |')
@section('content')

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">

                    <div class="step-process my-3">
                        <span class="step completed ">
                            <span class="number">
                                <i class="fas fa-check "></i>
                            </span>
                            <small class="text">
                                log in details
                            </small>
                        </span>
                        <span class="step active">
                            <span class="number">
                                2
                            </span>
                            <small class="text">
                                delivery address
                            </small>
                        </span>
                        <span class="step">
                            <span class="number">
                                3
                            </span>
                            <small class="text">
                                payment method
                            </small>
                        </span>
                    </div>

                    <div class="border-1 border rounded-1 gray-border p-3">
                        <h3 class="h5 font-body">
                            Select a delivery address
                        </h3>
                        <div class="row my-3">
                            <div class="col-md-6">

                                <div class="border-1 border rounded-1 gray-border p-2">

                                    <div class="address-header">
                                        <span class="name">
                                            Home
                                            <i class="fas fa-check selected"></i>
                                        </span>

                                        <button class="delete-address">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>

                                    <h6 class="h6 font-body">
                                        nishchay luthra
                                    </h6>
                                    <p>
                                        Rajat tower, near Jaswant inox, Kamptee Rd, Near Indora Chowk, Nagpur, Maharashtra
                                        440017
                                    </p>
                                    <a href="" class="btn btn-link text-pink px-0">
                                        <strong>
                                            deliver to this address
                                        </strong>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <button class="btn btn-pink">
                            +Add address
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 m-0 p-0 font-body">
                            log in details
                        </span>

                        <a href="" class="btn m-0 p-0 border-0 text-pink">change</a>
                    </div>
                    <hr class="mb-1">
                    <div class="text-muted">
                        nishchay luthra
                    </div>
                    <div class="text-muted">
                        nishchayluthra@gmail.com
                    </div>
                    <hr class="mt-1">
                    <span class="h5  font-body">
                        estimated delivery
                    </span>
                    <div class="d-flex justify-content-between align-items-center text-muted">
                        <span>
                            <span class="me-2">
                                29 march
                            </span>
                            <span>
                                Wednesday
                            </span>
                        </span>
                        <span>
                            (item 1)
                        </span>
                    </div>
                    <img src="https://via.placeholder.com/100" class="w-auto my-2 rounded-2 border border-1 pink-border"
                        alt="">
                    <hr>
                    <span class="h5  font-body">

                        price details
                    </span>
                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            total mRP:
                        </span>
                        <span>
                            ₹145.55
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            subtotal:

                        </span>
                        <span>
                            ₹145.55
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            shipping charges:
                        </span>
                        <span>
                            ₹145.55
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center text-muted my-3">
                        <strong class="text-black">
                            order total:
                        </strong>
                        <span>
                            ₹145.55
                        </span>
                    </div>

                    <hr class="my-1">
                </div>
            </div>
        </div>
    </section>

@endsection
