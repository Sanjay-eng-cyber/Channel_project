@extends('frontend.layouts.app')
@section('title', 'Skin |')

@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection

@section('content')

    <section>


        <div class="container mb-5">
            <div class="row mt-5">
                <div class="col-lg-5 col-xl-4">
                    <h2 class="main-head text-red">Best In {{ $category->name }} Products</h2>
                </div>
                <div class="col-lg-7 col-xl-5 ">
                    <div class="d-flex gap-4 justify-content-between flex-column flex-sm-row my-4 my-lg-0">
                        <div>
                            <form action="" method="post" class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="basic-addon2"
                                        style="background: rgba(251, 140, 165, 0.2);">
                                        <button type="submit" class="border-0"
                                            style="background: rgba(251, 140, 165, 0.2);"><i
                                                class="fas fa-search fa-fw text-red"></i></button>
                                    </span>

                                </div>
                            </form>
                        </div>
                        {{-- <div class="d-flex gap-3 align-items-baseline">
                            <div>For</div>
                            <div class="pro-radio-btn">
                                <input type="radio" class="btn-check" name="options" id="option01" autocomplete="off">
                                <label class="btn" for="option01">Him</label>
                            </div>
                            <div class="pro-radio-btn">
                                <input type="radio" class="btn-check" name="options" id="option02" autocomplete="off">
                                <label class="btn" for="option02">Her</label>
                            </div>

                        </div> --}}
                    </div>
                </div>

                <div class="col-lg-12 col-xl-3">
                    <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-5">
                        <div>Items per page</div>
                        <div style="width: 100px">
                            <select class="form-select form-select-lg mb-3 top-product-des"
                                aria-label=".form-select-lg example" style="font-size: 16px">
                                <option selected class="top-product-text">10</option>
                                <option value="1" class="top-product-text">20</option>
                                <option value="2" class="top-product-text">30</option>
                                <option value="3" class="top-product-text">40</option>
                            </select>
                        </div>
                    </div>


                    <div class="d-flex justify-content-end align-items-baseline gap-3 gap-xl-4 gap-xxl-5">
                        <div>Sort By</div>
                        <div style="width:160px">
                            <select class="form-select form-select-lg mb-3 top-product-des"
                                aria-label=".form-select-lg example" style="font-size: 16px">
                                <option selected class="top-product-text">Featured</option>
                                <option value="1" class="top-product-text">Price: Low to High</option>
                                <option value="2" class="top-product-text">Price: High to Low</option>
                                <option value="3" class="top-product-text">Avg. Customer Review</option>
                                <option value="3" class="top-product-text">Newest Arrivals</option>
                            </select>
                        </div>
                    </div>


                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">

                    {{-- <div class="mt-producttabs style2 wow fadeInUp p-0" data-wow-delay="0.6s">

                        <ul class="producttabs pro-slidetab">
                            <li><a href="#__skincare" class="active">Skin Care</a></li>
                            <li><a href="#__skinlatest">Latest</a></li>
                            <li><a href="#__skinbestseller">Best Seller</a></li>
                        </ul>
                    </div> --}}

                    <div class="tab-content">

                        <div id="__skincare">

                            <div class="product-show-grid">

                                @forelse ($products as $pro)
                                    <div class=" product-show-grid-card ">
                                        <div class="product-card-img">
                                            <button class="btn wishlist add-to-wish" data-p-id="{{ $pro->id }}">
                                                <span class="has-tool-tip">
                                                    <i class="fa-regular fa-heart"></i>
                                                    <span class="tool-tip-text">Add to wishlist</span>
                                                </span>
                                            </button>
                                            @if ($pro->thumbnail_image)
                                                <img src="{{ asset('storage/images/products/' . $pro->thumbnail_image) }}"
                                                    alt="...">
                                            @else
                                                <img src="/frontend/images/products/skin/sk2.png" class="img-slider"
                                                    alt="image description">
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title font-head fw-bold">
                                                {{ $pro->name }}
                                            </h4>
                                            <small class="text-muted">
                                                {{ $pro->short_descriptions }}
                                            </small>
                                            <div class="price">
                                                {{ $pro->mrp }} <s class="text-danger">{{ $pro->final_price }}</s>
                                            </div>
                                            <div class="buttons">
                                                <a href="{{ route('frontend.p.show', $pro->slug) }}" class="btn btn-orange">
                                                    Shop now
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-pink add-to-cart"
                                                    data-p-id="{{ $pro->id }}">
                                                    Add To Cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                @endforelse
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $products->onEachSide(1)->links('pagination::bootstrap-4') }}
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>




    </section>

@endsection
@section('js')
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script>
        $('a.add-to-cart').click(function() {
            if ($(this).attr("data-p-id")) {
                // console.log(this);
                var btn = $(this);
                axios.post('{{ route('frontend.p.addToCart') }}', {
                        product_id: $(this).attr("data-p-id")
                    })
                    .then(function(res) {
                        console.log(btn);
                        // console.log(res.data);
                        // return 0;
                        if (res.data.status) {
                            if (res.data.addToCart) {

                                btn[0].classList.add('btn-outline-pink');
                                btn[0].innerHTML =
                                    `<svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path></svg> Added`;
                            } else {
                                btn[0].classList.remove('btn-outline-pink');
                                btn[0].innerHTML = `Add To Cart`;
                            }
                            Snackbar.show({
                                text: res.data.message,
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#1abc9c'
                            });
                        } else {
                            Snackbar.show({
                                text: 'Something Went Wrong',
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        }
                    })
                    .catch(function(error) {
                        Snackbar.show({
                            text: "Something Went Wrong",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    });
            }
        });
    </script>
    <script>
        $('button.add-to-wish').click(function() {
            if ($(this).attr("data-p-id")) {
                // console.log(this);
                var btn = $(this);
                axios.post('{{ route('frontend.p.addToWishlist') }}', {
                        product_id: $(this).attr("data-p-id")
                    })
                    .then(function(res) {
                        // console.log(btn);
                        // console.log(res.data);
                        if (res.data.status) {
                            if (res.data.addToWishlist) {
                                btn[0].classList.add('active');
                                btn.find(".tool-tip-text")[0].innerHTML = "Remove From Wishlist";
                            } else {
                                btn[0].classList.remove('active');
                                btn.find(".tool-tip-text")[0].innerHTML = "Add to Wishlist";
                            }
                            Snackbar.show({
                                text: res.data.message,
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#1abc9c'
                            });
                        } else {
                            Snackbar.show({
                                text: res.data.message ?? 'Something Went Wrong',
                                pos: 'top-right',
                                actionTextColor: '#fff',
                                backgroundColor: '#2196f3'
                            });
                        }
                    })
                    .catch(function(error) {
                        Snackbar.show({
                            text: "Something Went Wrong",
                            pos: 'top-right',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    });
            }
        });
    </script>
@endsection
