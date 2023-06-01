@extends('frontend.layouts.app')
@section('title', 'Payment Process |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">

    <style>


div.progress-steps {
    width:100%;
    margin: 2em auto;
    counter-reset: step;
  }

  div.progress-steps button {
    width: 32%;
    float: left;
    font-size: 0.8rem;
    position: relative;
    text-align: center;
    font-weight: bold;
    color: black;
    display:inline-block;
    border-color: transparent;
    padding: 1px 7px 2px;
    background-color: transparent;
  }

.progress-steps button:hover:before,
.progress-steps button:focus:before{
   border-color:#EC268F;
}

  .progress-steps button:before {
    width: 2.5em;
    height: 2.5em;
    content: counter(step);
    counter-increment: step;
    line-height: 2.2em;
    border: 4px solid grey;
    display: block;
    text-align: center;
    margin: 0 auto .7em auto;
    border-radius: 50%;
    background-color: white;
    font-weight:bold;
    font-size:2em;


  }
  .progress-steps button:after {
    width: 100%;
    height: 4px;
    content: '';
    position: absolute;
    background-color:gray;
    top: 34%;
    left: -50%;
    z-index: -1;

  }

  .progress-steps button:focus:after {
    border-color: transparent;
    box-shadow: none;
    box-shadow: none;
}

  .progress-steps button:first-child:after {
    content: none;
  }
    .progress-steps button.active {
    color:white;
  }
  .progress-steps button.active:before {
    border-color:#EC268F;
    background-color:#EC268F;
  }
  .progress-steps button  .active + button:after {
    background-color: grey;
  }

    </style>
@endsection
@section('content')
    <x-frontend.profile-nav image="https://via.placeholder.com/300" name="users name" />

    <section class="my-1">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="bread-crum breadcrumb-hover">Profile</a></li>
                    <li class="breadcrumb-item bread-crum" aria-current="page">Payment Process</li>
                </ol>
            </nav>
        </div>
    </section>
    <section style="padding:0px 0px 50px 0px">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <div class="progress-steps">
                        <button class="showSingle" target="1" role="tab" tabindex="0" aria-controls="nils-tab" aria-label="Step 1"></button>
                        <button class="showSingle" target="2" role="tab" tabindex="0" aria-controls="nils-tab" aria-label="Step 2"></button>
                        <button class="showSingle" target="3" role="tab" tabindex="0" aria-controls="nils-tab" aria-label="Step 3"></button>

                        </div>
                        <div class="progress-steps d-flex justify-content-center  text-center ">
                        <p class="">Log In Details</p>
                        <p class="mx-xl-5 mx-md-3 mx-sm-3">Delivery Address</p>
                        <p>Payment Method</p>
                        </div>
                </div>
            </div>


                <section id="progress-content" class="hide">
                <div id="div1" class="targetDiv"><h4>Select A Delivery Address</h4>
                    <section>
                        <div class="col-lg-6 ">


                            <div class="profile-form-border p-4 mb-3">
                                <div class="row">

                                    <div class="col py-2">

                                    </div>
                                    <div class=" py-2">
                                        <ul class="d-flex gap-5 list-unstyled justify-content-start">

                                                <li>
                                                    <button type="button"
                                                        class="btn btn-primary position-relative profile-s-bg-color">Home

                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                            <i class="fas fa-check text-white"></i>
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </button>
                                                </li>


                                                <li>
                                                    <a href="'frontend.address.delete' data-bs-toggle='modal' data-bs-target='#trashbtn'">
                                                        <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                    </a>
                                                </li>

                                        </ul>

                                    </div>

                                    <h5>Nishchay luthra</h5>
                                    <p>Rajat tower, near Jaswant inox, Kamptee Rd, Near Indora Chowk, Nagpur, Maharashtra 440017</p>
                                    <a href="" class="text-red h6 text-decoration-underline">Deliver To This Address</a>
                                </div>
                            </div>


                  </div></div>
                    </section>

                <div id="div2" class="targetDiv"><h3>Planning</h3>
                <section>
                    <div class="col-lg-6 ">


                        <div class="profile-form-border p-4 mb-3">
                            <div class="row">

                                <div class="col py-2">

                                </div>
                                <div class=" py-2">
                                    <ul class="d-flex gap-5 list-unstyled justify-content-start">

                                            <li>
                                                <button type="button"
                                                    class="btn btn-primary position-relative profile-s-bg-color">Home

                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                        <i class="fas fa-check text-white" ></i>
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </button>
                                            </li>


                                            <li>
                                                <a href="'frontend.address.delete' data-bs-toggle='modal' data-bs-target='#trashbtn'">
                                                    <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                </a>
                                            </li>

                                    </ul>

                                </div>

                                <h5>Nishchay luthra</h5>
                                <p>Rajat tower, near Jaswant inox, Kamptee Rd, Near Indora Chowk, Nagpur, Maharashtra 440017</p>
                                <a href="" class="text-red h6 text-decoration-underline">Deliver To This Address</a>
                            </div>
                        </div>

                    </div></section>
              </div></div>

            </div>
                <div id="div3" class="targetDiv">
                    <h3>Execution</h3>
                    <div class="col-lg-3 col-md-6">


                        <div class="profile-form-border p-4 mb-3">
                            <div class="row">

                                <div class="col py-2">

                                </div>
                                <div class=" py-2">
                                    <ul class="d-flex gap-5 list-unstyled justify-content-start">

                                            <li>
                                                <button type="button"
                                                    class="btn btn-primary position-relative profile-s-bg-color">Home

                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle  bg-success border border-light rounded-circle profile-alert-icon">
                                                        <i class="fas fa-check text-white" ></i>
                                                        <span class="visually-hidden">New alerts</span>
                                                    </span>
                                                </button>
                                            </li>


                                            <li>
                                                <a href="'frontend.address.delete' data-bs-toggle='modal' data-bs-target='#trashbtn'">
                                                    <i class="far fa-trash-alt fa-1x profile-trash-icon"></i>
                                                </a>
                                            </li>

                                    </ul>

                                </div>

                                <h5>Nishchay luthra</h5>
                                <p>Rajat tower, near Jaswant inox, Kamptee Rd, Near Indora Chowk, Nagpur, Maharashtra 440017</p>
                                <a href="" class="text-red h6 text-decoration-underline">Deliver To This Address</a>
                            </div>
                        </div>


              </div></div>

        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>


    </section>

    {{-- @include('frontend.not-found') --}}

@endsection
