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

                 <div class="review-main-switch my-3">
                    <div class="review-center-switch d-flex gap-5 justify-content-center mb-5 mb-md-0">
                        <h5 class="main-head">Contribute</h5>
                        <h5 class="main-head">Your Review</h5>
                    </div>

                    <div class="review-side-switch d-flex gap-2 justify-content-end">
                        <div class="review-old-cl">Older</div>
                        <div class="review-slash">|</div>
                        <div class="review-old-cl">Newer</div>
                    </div>

                 </div>


                </div>
            </div>

        </div>

        <div class="row d-flex justify-content-center review-main-section" style="">
            <div class="col-sm-10">
                <div class="row review-subsection">

                   <div class="col-12 col-xl-8 review-first-section">
                        <div class="d-flex flex-column flex-lg-row gap-3 review-first-subsection">
                            <div class="review-first-subsection-img">
                                <img src="frontend/images/products/skin/sk1.png" class="img-fluid img-border" alt="">
                            </div>

                            <div class="d-flex flex-column justify-content-center review-first-subsection-desc">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p>essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....</p>

                                <ul class="review-status p-0">
                                    <li class="no-bullet review-price">From ₹145.55</li>
                                    <li class="no-bullet  review-sts text-green">In Stock</li>
                                    <li class="no-bullet  review-delivered">
                                        <button type="submit" class="btn  ">
                                            <a href="http://">Delivered</a>
                                        </button>
                                    </li>
                                </ul>

                            </div>
                        </div>
                   </div>

                   <div class="col-12 col-xl-4 review-second-section py-5 py-xl-0">
                    <h5 class="main-head">Write A Review</h5>
                    <hr>


                        <form action="" method="post">
                            <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                <div>Give Your Rating</div>
                                <div class="rating d-flex flex-row justify-contend-end gap-2 text-green">
                                    <span class="far fa-star review-star-color" data-value="1"></span>
                                    <span class="far fa-star review-star-color" data-value="2"></span>
                                    <span class="far fa-star review-star-color" data-value="3"></span>
                                    <span class="far fa-star review-star-color" data-value="4"></span>
                                    <span class="far fa-star review-star-color" data-value="5"></span>
                                </div>
                            </div>

                            <div class="py-4">
                                <input type="text" class="form-control my-2 review-sub-headline review-input-bg" placeholder="Headline">

                                <textarea name="" id="" cols="10" rows="2" class="mt-3 form-control w-100  review-sub-textarea review-input-bg"
                                    placeholder="Enter Your Text"></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-pink">Post Your Review</button>
                            </div>
                        </form>
                   </div>


                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center review-main-section my-4" style="">
            <div class="col-sm-10">
                <div class="row review-subsection">

                   <div class="col-12 col-xl-8 review-first-section">
                        <div class="d-flex flex-column flex-lg-row gap-3 review-first-subsection">
                            <div class="review-first-subsection-img">
                                <img src="frontend/images/products/skin/sk1.png" class="img-fluid img-border" alt="">
                            </div>

                            <div class="d-flex flex-column justify-content-center review-first-subsection-desc">
                                <h5 class="main-head">Essence Long Lasting Eye Pencil</h5>
                                <p>essence Long Lasting Eye Pencil is a creamy and
                                    pigmented eye pencil that brightens and accentuates your eye more....</p>

                                <ul class="review-status p-0">
                                    <li class="no-bullet review-price">From ₹145.55</li>
                                    <li class="no-bullet  review-sts text-green">In Stock</li>
                                    <li class="no-bullet  review-delivered">
                                        <button type="submit" class="btn  ">
                                            <a href="http://">Delivered</a>
                                        </button>
                                    </li>
                                </ul>

                            </div>
                        </div>
                   </div>

                   <div class="col-12 col-xl-4 review-second-section py-5 py-xl-0">
                    <h5 class="main-head">Write A Review</h5>
                    <hr>


                        <form action="" method="post">
                            <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                <div>Give Your Rating</div>
                                <div class="rating d-flex flex-row justify-contend-end gap-2 text-green">
                                    <span class="far fa-star review-star-color" data-value="1"></span>
                                    <span class="far fa-star review-star-color" data-value="2"></span>
                                    <span class="far fa-star review-star-color" data-value="3"></span>
                                    <span class="far fa-star review-star-color" data-value="4"></span>
                                    <span class="far fa-star review-star-color" data-value="5"></span>
                                </div>
                            </div>

                            <div class="py-4">
                                <input type="text" class="form-control my-2 review-sub-headline review-input-bg" placeholder="Headline">

                                <textarea name="" id="" cols="10" rows="2" class="mt-3 form-control w-100  review-sub-textarea review-input-bg"
                                    placeholder="Enter Your Text"></textarea>
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
.review-center-switch h5 {
  color:rgba(57, 53, 53, 0.34);

}

.review-center-switch h5:active {
  color:rgba(236, 38, 143, 1);
}

.review-old-cl{
    color: rgba(57, 53, 53, 0.34);
}

.review-slash{
    color: rgba(57, 53, 53, 0.34);
}
 .review-old-cl:active{
    color:black;
}
    .review-main-switch{
        isolation: isolate;
        position: relative;
    }

   .review-main-switch .review-side-switch {
           position: absolute;
                    right: 0px;
                    bottom: 8px;
                    z-index: 10;

    }

.review-sub-textarea::placeholder {
        text-align: start;

}

.review-sub-headline::placeholder {
        text-align: start;

    }

.review-main-section .review-subsection{
   border: 1px solid rgba(0, 0, 0, 0.2);
   border-radius: 8px;
   padding: 1.5rem;
}
.review-first-section
.review-first-subsection-img img{
    width:370px
}

.review-first-subsection .review-first-subsection-desc .review-status{
     display: flex;
     gap:3rem;
     align-items: center;

}

.review-first-subsection-desc .review-status .review-price{
    font-weight: 600;
}
.review-first-subsection-desc .review-status .review-delivered button{
    background: rgba(235, 181, 121, 0.51);
    color:black;
}



@media screen and (max-width:992px){
    .review-first-section
    .review-first-subsection-img img{
    width:194px;
    margin: 10px auto 10px auto;

}
}




@media screen and (max-width:768px){
    .review-main-switch .review-side-switch {
    position: absolute;
    right: 0px;
    bottom: 8px;
    z-index: 10;
    transform: translate(-50%, -50%);
}

}


@media screen and (max-width:576px){
    .review-main-section .review-subsection{
   border: 0px solid rgba(0, 0, 0, 0.2);
   border-radius: 0px;
   padding: 0rem;
    }
}

@media screen and (max-width:480px){
.review-first-subsection .review-first-subsection-desc .review-status{
     display: flex;
    justify-content: space-between;
    flex-direction:column;
    gap:1rem;
}

}
</style>
