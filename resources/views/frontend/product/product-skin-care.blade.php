@extends('frontend.layouts.app')
@section('title', 'Skin Care |')

@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection

@section('content')

<section>


    <div class="container">
        <div class="row my-4">
            <div class="col-lg-5 col-xl-4">
                <h2 class="main-head text-red">Best In Skin Products</h2>
            </div>
            <div class="col-lg-7 col-xl-5 ">
                 <div class="d-flex gap-4 justify-content-between flex-column flex-sm-row">
                    <div>
                        <form action="" method="post" class="m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" aria-label="Recipient's username"
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2" style="background: rgba(251, 140, 165, 0.2);">
                                    <i class="fas fa-search fa-fw text-red"></i>
                                </span>

                            </div>
                        </form>
                    </div>
                    <div class="d-flex gap-3 align-items-baseline">
                        <div>For</div>
                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                        <label class="btn skin-radio-1" for="option2">Him</label>
                        <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                        <label class="btn skin-radio-2" for="option2">Her</label>
                        {{-- <button type="button" class="btn btn-primary">Her</button>
                        <button type="button" class="btn btn-primary">Him</button> --}}
                    </div>
                 </div>
            </div>

            <div class="col-lg-12 col-xl-3">
              <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-5">
                <div>Items per page</div>
                <div style="width: 100px">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>10</option>
                        <option value="1">20</option>
                        <option value="2">30</option>
                        <option value="3">40</option>
                    </select>
                </div>
              </div>


              <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-5">
                <div>Sort By</div>
                <div style="width:160px">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Featured</option>
                        <option value="1">Best selling</option>
                        <option value="2">A to A</option>
                        <option value="3">under 100</option>
                        <option value="3">under 200</option>
                        <option value="3">under 300</option>
                    </select>
                </div>
              </div>


            </div>


        </div>

        <div class="row">
            <div class="col-sm-12">

                <div class="mt-producttabs style2 wow fadeInUp" data-wow-delay="0.6s">
                    <!-- producttabs start here -->
                    <ul class="producttabs">
                        <li><a href="#__skincare" class="active">Skin Care</a></li>
                        <li><a href="#__skinlatest">Latest</a></li>
                        <li><a href="#__skinbestseller">Best Seller</a></li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div id="__skincare">
                        <!-- tabs slider start here -->
                        <div class="__skin-sliderlg">
                        {{-- @for ($i = 1; $i < 7; $i++)



                        @endfor --}}
                        <h1>Channel<h1>
                        </div>
                        <!-- tabs slider end here -->
                    </div>

                    <div id="__skinlatest">
                        <!-- tabs slider start here -->
                        <h1>channel2<h1>
                        <!-- tabs slider end here -->
                    </div>


                    <div id="__skinbestseller">
                        <!-- tabs slider start here -->

                        <!-- tabs slider end here -->
                    </div>



                </div>



            </div>
        </div>
    </div>




</section>

@endsection
