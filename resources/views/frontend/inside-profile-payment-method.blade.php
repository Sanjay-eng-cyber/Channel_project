@extends('frontend.layouts.app')
@section('title', 'Wishlist |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 mx-auto">
                    {{-- cash on delevery --}}
                    <div class="p-3">
                        <h5 class="h5 main-head text-center text-red my-4">Your Paynent Method</h5>
                        <form action="" method="post">
                            @for ($i=0;$i<=3;$i++)
                                <div class="form-group cc-border py-2 px-3 my-3 py-ck-wallet ">
                                    <div class="form-check d-flex gap-4 py-ck-wallet-grp flex-row-reverse justify-content-between">
                                        <input class="form-check-input py-ck-wallet-fi" type="radio" name="gender"
                                            id="male" value="male" checked>
                                        <label class="form-check-label" for="male">payment method here</label>
                                    </div>
                                </div>
                            @endfor
                        </form>

                    </div>

                </div>
            </div>
        </div>

    </section>

    @include('frontend.not-found')

@endsection
