@extends('frontend.layouts.app')
@section('title', 'Review Index |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

<section style="padding:70px 0px 70px 0px">
    <div class="container">
        <div class="row" style="display: flex;justify-content: center;">
            <div class="col-sm-10">
                <div class="row p-4" style="border: 1px solid rgba(0, 0, 0, 0.2);border-radius: 8px;">

                   <div class="col-12 col-xl-8">
                        <div style="display: flex;gap: 2rem;">
                            <div>
                                <img src="frontend/images/products/skin/sk1.png" class="img-fluid img-border" alt="" style="width:370px">
                            </div>

                            <div class="d-flex flex-column justify-content-center">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p>essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....</p>

                                <ul style="    display: flex;
                                justify-content: space-between;">
                                    <li>From ₹145.55</li>
                                    <li>In Stock</li>
                                    <li>Delivered</li>
                                </ul>

                            </div>
                        </div>
                   </div>

                   <div class="col-12 col-xl-4">
                    <h5 class="main-head">Write A Review</h5>
                    <hr>


                        <form action="" method="post">
                            <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                <div>Give Your Rating</div>
                                <div class="rating d-flex flex-row justify-contend-end gap-2">
                                    <span class="far fa-star review-star-color" data-value="1"></span>
                                    <span class="far fa-star review-star-color" data-value="2"></span>
                                    <span class="far fa-star review-star-color" data-value="3"></span>
                                    <span class="far fa-star review-star-color" data-value="4"></span>
                                    <span class="far fa-star review-star-color" data-value="5"></span>
                                </div>
                            </div>

                            <div class="py-4">
                                <input type="text" class="form-control" placeholder="Enter your text here">
                                <br/>
                                <textarea name="" id="" cols="10" rows="2" class="w-100 write-review-textarea text-start"
                                    placeholder="Enter Text"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-pink">Post Your Review</button>
                            </div>
                        </form>
                   </div>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection


<style>


</style>
