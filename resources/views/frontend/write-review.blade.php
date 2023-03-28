@extends('frontend.layouts.app')
@section('title', 'Order Tracking First |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <section class="py-5">

        <div class="container">
            <div class="row write-review-bdr-all">


                <div class="col-12 col-lg-6 write-review-bdr-one">
                    <div class="p-0 p-sm-3">
                        <div>
                            <img src="frontend/images/products/skin/sk1.png" alt=""
                                class="img-fluid img-border m-auto m-lg-0" style="width:425px">
                        </div>

                        <div>
                            <div class="write-review-fw main-head pt-4 pb-2">Essence Long Lasting Eye Pencil</div>
                            <div>essence Long Lasting Eye Pencil is a creamy and pigmented eye pencil that brightens and
                                accentuates your eye more....</div>
                        </div>

                        <hr>
                        <div>
                            <ul class="d-flex flex-column flex-md-row justify-content-between p-0 gap-2 gap-md-0">
                                <li class="write-review-fw ">Delivered <br /> 19 March 2023</li>
                                <li class="text-blue write-review-fw">Return order</li>
                                <li class="write-review-fw no-bullet">From ₹145.55</li>
                            </ul>
                        </div>


                    </div>
                </div>


                <div class="col-12 col-lg-6 py-5  py-lg-0">
                    <div class="p-0 p-sm-3">
                        <h5 class="main-head">Write A Review</h5>
                        <hr>

                        <div class="pb-2">
                            <form action="" method="post">
                                <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                    <div>Give Your Rating</div>
                                    <div class="rating d-flex flex-row justify-contend-end gap-3">
                                        <span class="far fa-star review-star-color" data-value="1"></span>
                                        <span class="far fa-star review-star-color" data-value="2"></span>
                                        <span class="far fa-star review-star-color" data-value="3"></span>
                                        <span class="far fa-star review-star-color" data-value="4"></span>
                                        <span class="far fa-star review-star-color" data-value="5"></span>
                                    </div>
                                </div>

                                <div class="py-4">
                                    <textarea name="" id="" cols="30" rows="6" class="w-100 write-review-textarea text-start"
                                        placeholder="Enter Text"></textarea>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-pink">Post Your Review</button>
                                </div>
                            </form>
                        </div>

                        <div class="review-guid-line my-2">
                            <div class="review-guid-line-heading">Review Guidelines</div>
                            <p>Once written and submitted, reviews are the sole property of channel. and channel reserves
                                the right to refuse
                                and remove any review/rating.
                                channel will not be held responsible or accept any liability of reviews posted for any
                                product/brand.
                                The opinions expressed in reviews are those of channel users and not of channel.</p>
                            <div class="review-guid-line-heading">Disclaimer</div>
                            <p>Once written and submitted, reviews are the sole property of channel. and channel reserves
                                the right to refuse
                                and remove any review/rating.
                                channel will not be held responsible or accept any liability of reviews posted for any
                                product/brand.
                                The opinions expressed in reviews are those of channel users and not of channel.</p>

                        </div>
                    </div>


                    <div>
                    </div>


                </div>
            </div>
    </section>

@endsection

<style>
    .write-review-fw {
        font-weight: 500;
        font-size: 1.15rem;
        line-height: 1.2;
    }

    .write-review-fw-subhead {
        font-weight: 500;
    }

    .review-star-color {
        color: rgba(30, 186, 17, 1);
        width: 29px;
        height: 24px;
    }

    .write-review-textarea {
        background: #FAF8F8;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
    }

    .write-review-textarea::placeholder {
        text-align: start;
        padding: 10px;
    }

    .review-guid-line {
        background: #FAF8F8;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        padding: 20px;
    }

    .review-guid-line-heading {
        font-weight: 500;
    }

    .write-review-bdr-one {
        border-right: 1px solid rgba(0, 0, 0, 0.2);
    }

    .write-review-bdr-all {
        background: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 8px;
        padding: 22px;

    }

    @media screen and (max-width:580px) {
        .write-review-bdr-all {
            background: #FFFFFF;
            border: 0px solid rgba(0, 0, 0, 0.2);
            border-radius: 0px;
            padding: 0px;
        }
    }

    @media screen and (max-width:992px) {
        .write-review-bdr-one {
            border-right: 0px solid rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        }
    }
</style>
