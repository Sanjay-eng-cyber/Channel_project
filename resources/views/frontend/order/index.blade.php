@extends('frontend.layouts.app')
@section('title', 'Order |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.profile') }}"
                            class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">My Orders</li>
                </ol>
            </nav>
        </div>
    </section>
    <section style="padding:0px 0px 50px 0px">
        <div class="container">
            @forelse($orders as $order)
                <div class="row py-4">
                    <div class="d-flex justify-content-center my-order-main">
                        <div class="col-sm-10  my-order-main-out">
                            <div class="row  my-order-main-in">
                                <div
                                    class="col-sm-12 col-md-4 col-lg-4 col-xl-3 d-flex justify-content-center flex-column my-order-main-in-img">
                                    <img src="{{ asset('storage/images/products/thumbnails/' . $order->items->first()->product->thumbnail_image) }}"
                                        class="img-fluid order-prod-thumb-img" alt="">
                                </div>
                                <div class="col-sm-12  col-md-8 col-lg-8 col-xl-6  my-order-main-desc">

                                    <h5 class="main-head">{{ $order->items->first()->product->name }}@if ($order->items->count() > 1)
                                            {{ ' & more' }}
                                        @endif
                                    </h5>
                                    <ul class="list-unstyled d-flex gap-2 flex-column">
                                        {{-- <li>
                                            <ul class="gap-2 d-flex flex-row flex-lg-column flex-xl-column  gap-lg-1 justify-content-between"
                                                style="padding: 0px 0px 0px 17px;">
                                                <li>Expected Delivery</li>
                                                <li class="no-bullet">19 March 2023</li>
                                            </ul>
                                        </li> --}}
                                        <li class="price">Total Amount: ₹ {{ $order->total_amount }}</li>
                                        <li class="status">
                                            <ul
                                                class="gap-2 d-flex flex-row flex-lg-column flex-xl-column  gap-lg-2 justify-content-between p-0">
                                                {{-- <li class="return-order light-sky">
                                                    <a href="http://" class="light-sky">
                                                        Return Order
                                                    </a>
                                                </li> --}}
                                                @if ($order->status == 'completed' && !$order->deliveries->count())
                                                    <li class="cancel-order text-red list-unstyled">
                                                        <a href="{{ route('frontend.order.cancel', $order->id) }}"
                                                            class="text-red">
                                                            Cancel Order
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($order->status == 'cancelled')
                                                    <li class="cancel-order text-red list-unstyled">
                                                        <a href="javascript:void(0)" class="text-red">
                                                            Order Cancelled
                                                        </a>
                                                    </li>
                                                @elseif ($order->status == 'returned')
                                                    <li class="cancel-order text-red list-unstyled">
                                                        <a href="javascript:void(0)" class="text-red">
                                                            Order Returned
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                                <div
                                    class="col-sm-12  col-md-12 col-lg-12 col-xl-3 py-3 py-xl-0 py-xxl-0  my-order-main-in-btn gap-2">
                                    {{-- <a href="http://" class="arriving-or-btn">Arriving Wednesday</a> --}}
                                    <button type="button" class="btn  add-orderDetails-btn">
                                        <a href="{{ route('frontend.order.show', $order->id) }}">
                                            Order Details
                                        </a>
                                    </button>
                                    {{-- <button type="submit" class="btn  add-track-btn">
                                        <a href="http://">
                                            Track Order
                                        </a>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    @include('frontend.not-found')
                @endforelse

            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->onEachSide(1)->links('pagination::bootstrap-4') }}
            </div>
        </section>


    @endsection
