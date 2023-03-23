@extends('frontend.layouts.app')
@section('title', 'Buy Again |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
    <section style="padding: 100px 0px 100px 0px">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 p-5 order-return-first-main">

                    <div class="order-return-first-search">
                        <h6 class="main-head py-3 or-first-card-color">What is the issue with the item?</h6>
                        <select class="form-select" aria-label="Default select example" style="">
                            <option selected>Choose a response</option>
                            <option value="1">product damaged but shipping box ok </option>
                            <option value="2">product and shipping box both damaged</option>
                            <option value="3">wrong item was sent</option>
                            <option value="4">item defective or not working</option>
                            <option value="5">items or part missing</option>
                        </select>
                    </div>

                    <div class="pt-4 order-return-first-add-one">
                        <h6 class="main-head pt-3 or-first-card-color">Add photos of the item</h6>
                        <p>Capture photos of each item separately with visible defects. Wait for photos to upload. </p>

                        <label for="file-upload" class="btn">
                            Add Photos
                        </label>
                        <input id="file-upload" type="file" style="display: none;">
                    </div>

                    <div class="pt-5 order-return-first-add-second">
                        <h6 class="main-head or-first-card-color">Add photos of the item</h6>
                        <P>Capture photos of each item separately with visible defects. Wait for photos to upload.</P>

                        <img src="frontend/images/order-img/or-1.png" alt="" class="img-fluid py-3" style="width: 123px;">
                        <label for="file-upload" class="btn btn-primary">
                            Add Photos
                        </label>
                        <input id="file-upload" type="file" style="display: none;">
                    </div>

                    <div class="py-4 order-return-first-cmnt or-first-card-color">
                        <h6 class="main-head pt-3 or-first-card-color">Comments (optional):</h6>
                        <input type="text" class="form-control w-50" placeholder="Enter your text here" aria-label="Input field" aria-describedby="basic-addon2">

                    </div>

                </div>
                <div class="col-sm-5">

                </div>
            </div>
        </div>
    </section>
@endsection
