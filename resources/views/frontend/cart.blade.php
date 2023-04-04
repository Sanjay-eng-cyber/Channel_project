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
              
            </div>
        </div>

    </section>

    @include('frontend.not-found')

@endsection
