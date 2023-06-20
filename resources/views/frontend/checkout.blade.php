@extends('frontend.layouts.app')
@section('title', 'About-Us |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section class="my-5">
        <div class="container">
            <form action="{{ route('frontend.p.payment', $products->first()->slug) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-4">

                        <div class="step-process my-3">
                            <span class="step completed ">
                                <span class="number">
                                    <i class="fas fa-check "></i>
                                </span>
                                <small class="text">
                                    Log In Details
                                </small>
                            </span>
                            <span class="step active">
                                <span class="number">
                                    2
                                </span>
                                <small class="text">
                                    Delivery Address
                                </small>
                            </span>
                            <span class="step">
                                <span class="number">
                                    3
                                </span>
                                <small class="text">
                                    Payment
                                </small>
                            </span>
                        </div>

                        <div class="border-1 border rounded-1 gray-border p-3">
                            <h3 class="h5 font-body">
                                Select A Delivery Address
                            </h3>
                            <div class="row my-3">

                                @forelse ($userAddresses as $address)
                                    <div class="col-12 user-address-box-holder">
                                        <input type="radio" name="address" value="{{ $address->id }}"
                                            id="user-address-{{ $address->id }}" class="d-none" required>
                                        <label for="user-address-{{ $address->id }}" class="user-address-box w-100 p-2">
                                            <div class="address-header">
                                                <span class="name">
                                                    {{ ucfirst($address->type) }}
                                                </span>
                                            </div>
                                            <h6 class="h6 font-body text-capitalize">
                                                {{ $address->name }}
                                            </h6>
                                            <p class="tex-capitalize">
                                                {{ $address->street_address . ', ' . $address->landmark }}
                                                <br>
                                                {{ $address->city . ', ' . $address->state }}
                                                <br>
                                                {{ $address->country . ', ' . $address->postal_code }}
                                            </p>
                                        </label>
                                    </div>
                                @empty
                                @endforelse

                            </div>
                            <button class="btn btn-pink">
                                +Add Address
                            </button>
                        </div>

                    </div>
                    <div class="col-lg-6 mb-4">

                        <span class="h5 font-body text-capitalize">
                            Items
                        </span>
                        {{-- <span class="h5 font-body text-capitalize">
                        Estimated Delivery
                    </span> --}}
                        {{-- <div class="d-flex justify-content-between align-items-center text-muted">
                        <span>
                            <span class="me-2">
                                29 March
                            </span>
                            <span>
                                Wednesday
                            </span>
                        </span>
                    </div> --}}

                        <div class="row">

                            @foreach ($products as $product)
                                <div class="col-12 d-flex">
                                    <img src="https://via.placeholder.com/100"
                                        class="w-auto my-2 rounded-2 border border-1 pink-border me-3" height="100px"
                                        width="100px" alt="">
                                    <div class="mt-1">
                                        <p class="mb-1 text-black">{{ $product->name }}</p>
                                        <span>Price: ₹{{ $product->final_price }}</span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <hr>
                        <span class="h5  font-body text-capitalize">Price Details
                        </span>

                        <div class="d-flex justify-content-between align-items-center text-muted my-1">
                            <span>
                                Sub-Total:
                            </span>
                            <span>
                                ₹{{ $subTotal }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center text-muted my-1">
                            <span>
                                GST:
                            </span>
                            <span>
                                ₹{{ $gst['total'] }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center text-muted my-1">
                            <span>
                                Total MRP:
                            </span>
                            <span>
                                ₹{{ $grandTotal }}
                            </span>
                        </div>
                        {{-- <div class="d-flex justify-content-between align-items-center text-muted my-1">
                        <span>
                            Shipping Charges:
                        </span>
                        <span>
                            ₹{{ '---' }}
                        </span>
                    </div> --}}
                        <div class="d-flex justify-content-between align-items-center text-muted my-3">
                            <strong class="text-black">
                                Order Total:
                            </strong>
                            <span class="text-black">
                                ₹{{ $grandTotal }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-center justify-content-md-end text-muted my-3">
                            <button type="submit" class="btn btn-outline-pink-hover p-1 p-xl-2 text-end">
                                Proceed To Payment
                            </button>
                        </div>
                        <hr class="my-1">
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
