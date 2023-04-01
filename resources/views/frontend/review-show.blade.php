@extends('frontend.layouts.app')
@section('title', 'Review Index |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@section('content')
<x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />


<section style="padding:70px 0px 70px 0px">
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-sm-10">
                <div class="row">

                 <div class="rv-show-switch my-3">
                    <div class="review-center-switch d-flex gap-5 justify-content-center mb-5 mb-md-0">
                        <h5 class="main-head">Contribute</h5>
                        <h5 class="main-head">Your Review</h5>
                    </div>

                    <div class="rv-show-side-switch d-flex gap-2 justify-content-end">
                        <div class="review-old-cl">Older</div>
                        <div class="review-slash">|</div>
                        <div class="review-old-cl">Newer</div>
                    </div>

                 </div>


                </div>
            </div>

        </div>

        <div class="row d-flex justify-content-center rv-show-main">
            {{-- <button type="button" class="btn-close" aria-label="Close"></button> --}}

            <div class="col-sm-10">
                <div class="row rv-show-section p-3">
                  <div class="col-12 col-xl-3 rv-show-img">
                        <div class="review-first-subsection-img">
                            <img src="frontend/images/products/skin/sk1.png" class="img-fluid img-border m-auto m-xl-0" alt="" style="width:170px">
                        </div>
                  </div>

                   <div class="col-12 col-xl-8 rv-show-desc mt-4 mt-xl-0">
                            <div class="d-flex flex-column justify-content-center rv-show-subsection">
                             <div class="d-flex justify-content-between">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                             </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <h6 class="main-head">Your Review</h6>
                                        <hr>
                                        <div class="rating d-flex flex-row justify-content-start gap-2 text-green" style="height:30%">
                                            <span class="fas fa-star review-star-color" data-value="1"></span>
                                            <span class="fas fa-star review-star-color" data-value="2"></span>
                                            <span class="fas fa-star review-star-color" data-value="3"></span>
                                            <span class="fas fa-star review-star-color" data-value="4"></span>
                                            <span class="far fa-star review-star-color" data-value="5"></span>

                                        </div>
                                        <h6 class="main-head">"Heading here "</h6>
                                    </div>
                                    <div class="col-12 col-md-9 my-3 my-md-0">
                                        <p class="">
                                            I use this long stay intense kajal first time, it is very good black preal kajal, it's water proof, smudge proof long lasting, and dark shiny black. It's made by sunflower seeds oil and vitamin E, I'm very happy after using this product.
                                                It gives bold look in eyes and make eyes more beautiful. Totally satisfied with this eyes friendly product
                                            lorem
                                            </p>

                                    </div>
                                </div>

                            </div>
                        </div>
                   </div>

                </div>
            </div>
        </div>

    </div>
</section>

@include('frontend.not-found')


@endsection
<style>
    .rv-show-section{
        background: #FFFFFF;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px;

}

.rv-show-switch{
        isolation: isolate;
        position: relative;
    }

   .rv-show-switch .rv-show-side-switch {
           position: absolute;
                    right: 0px;
                    bottom: 8px;
                    z-index: 10;

    }



@media screen and (max-width:768px){
    .rv-show-switch .rv-show-side-switch {
    position: absolute;
    right: 0px;
    bottom: 8px;
    z-index: 10;
    transform: translate(-50%, -50%);
}

}
</style>
