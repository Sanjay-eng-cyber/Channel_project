@extends('frontend.layouts.app')
@section('title', 'Order Tracking First |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-6">
                    <div class="p-5">
                        <div>
                            <div>
                                <img src="frontend/images/products/skin/sk1.png" alt="" class="img-fluid img-border" style="width:425px">
                            </div>

                            <div>
                                <div class="write-review-fw main-head pt-4 pb-2">Essence Long Lasting Eye Pencil</div>
                                <div>essence Long Lasting Eye Pencil is a creamy and pigmented eye pencil that brightens and accentuates your eye more....</div>
                            </div>
                        </div>
                        <hr>
                        <ul class="d-flex justify-content-between p-0">
                            <li class="write-review-fw ">Delivered <br/> 19 March 2023</li>
                            <li class="text-blue write-review-fw">Return order</li>
                            <li class="write-review-fw no-bullet">From ₹145.55</li>
                        </ul>
                    <div>


                </div>

                <div class="col-sm-12 col-md-6">

                </div>


            </div>
        </div>
    </section>

@endsection

<style>
    .write-review-fw{
        font-weight: 500;
        font-size: 1.15rem;
        line-height: 1.2;
    }
    .write-review-fw-subhead{
        font-weight: 500;
    }

</style>
