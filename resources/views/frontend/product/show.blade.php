@extends('frontend.layouts.app')
@section('title', $product->name . ' |')
@section('cdn')
    <link rel="stylesheet" href="{{ url('frontend/css/profile.css') }}">
@endsection
@push('meta')
    <meta name="keywords" content="{{ count($tags) ? implode(', ', $tags) : $product->name }}">
    <meta name="description" content="{{ $product->name }}">
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ $product->name }}">
    <meta property="og:image" content="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta name="twitter:card" content="{{ asset('storage/images/products/thumbnails/' . $product->thumbnail_image) }}">
@endpush
@section('content')

    <main id="mt-main">

        <section class="my-1 mt-3">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.cat.show', $category->slug) }}"
                                class="bread-crum breadcrumb-hover">{{ $category->name }}</a></li>
                        @if ($subCategory)
                            <li class="breadcrumb-item"><a
                                    href="{{ route('frontend.sub-category.show', [$category->slug, $subCategory->slug]) }}"
                                    class="bread-crum breadcrumb-hover">{{ $subCategory->name }}</a></li>
                        @endif
                        {{-- <li class="breadcrumb-item bread-crum" aria-current="page">{{ $product->name }}</li> --}}
                    </ol>
                </nav>
            </div>
        </section>

        <!-- Mt Product detial of the Page -->
        <section class="mt-product-detial mt-4 " data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Slider of the Page -->
                        <div class="slider">
                            <div class="product-slider">
                                @foreach ($product->medias as $media)
                                    <div class="slide">
                                        <img src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                            alt="image description">
                                    </div>
                                @endforeach
                            </div>

                            <ul class="list-unstyled slick-slider pagg-slider">
                                @foreach ($product->medias as $media)
                                    <li>
                                        <div class="img">
                                            <img src="{{ asset('storage/images/products/' . $media->file_name) }}"
                                                alt="image description" class="min-h-2-80">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Pagg Slider of the Page end -->
                        </div>
                        <!-- Slider of the Page end -->
                        <!-- detial Holder of the Page -->
                        <div class="detial-holder">
                            <h1 class="h3 font-body">
                                {{ $product->name }}
                            </h1>
                            <hr>
                            {{-- <p class="text-muted">
                                {!! $product->short_descriptions !!}
                            </p> --}}
                            <div class="d-flex flex-row  justify-content-between align-items-start">
                                <div>
                                    <h3 class="h5 font-body rem-1">
                                        From ₹{{ $product->final_price }} <s class="text-danger">₹{{ $product->mrp }}</s>
                                    </h3>
                                    @if ($product->stock)
                                        <h4 class="font-body h5 text-green in-stock mb-0">
                                            <i class="fa-regular fa-circle-check"></i> In Stock
                                        </h4>
                                    @else
                                        <h4 class="font-body h5 text-red">
                                            <i class="fa-regular fa-circle-xmark"></i> Out of Stock
                                        </h4>
                                    @endif
                                </div>
                                @if (in_array($product->id, $wishlist))
                                    <button type="button" class=" btn p-show add-to-wish active"
                                        data-p-id="{{ $product->id }}">
                                        <i class="fa-regular fa-heart"></i>
                                        <span class="tool-tip-text">
                                            Remove From Wishlist
                                        </span>
                                    </button>
                                @else
                                    <button type="button" class="btn m-0 p-0 p-show add-to-wish  "
                                        data-p-id="{{ $product->id }}">
                                        <i class="fa-regular fa-heart"></i>
                                        <span class="tool-tip-text">
                                            Add To Wishlist
                                        </span>
                                    </button>
                                @endif
                            </div>


                            <div class="row">
                                <form action="{{ route('frontend.p.checkout', $product->slug) }}" method="GET">

                                    <div class="d-flex flex-column flex-xl-row justify-content-between my-3 ">

                                        <div class="qty-counter my-1 my-sm-0 my-md-3 my-lg-0">
                                            <label for="qty" class="px-2">
                                                Quantity
                                            </label>
                                            <div class="input-group flex-nowrap counter">
                                                <button type="button" class="input-group-text decrease-quantity">-</button>
                                                <input type="number" name="quantity" class="form-control quantity-input"
                                                    value="1">
                                                <button type="button" class="input-group-text increase-quantity">+</button>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex justify-content-between justify-content-sm-start justify-content-lg-end justify-content-xl-between gap-1 gap-sm-3 mt-3 mt-xl-0  ">
                                            <button class="btn btn-black btn-40padding" type="submit">
                                                Buy Now
                                            </button>

                                            @if (in_array($product->id, $productInCart))
                                                <a href="javascript:void(0)"
                                                    class="btn btn-pink add-to-cart btn-outline-pink btn-40padding"
                                                    data-p-id="{{ $product->id }}">
                                                    <svg class="svg-inline--fa fa-check" aria-hidden="true"
                                                        focusable="false" data-prefix="fas" data-icon="check" role="img"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                        data-fa-i2svg="">
                                                        <path fill="currentColor"
                                                            d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                        </path>
                                                    </svg> Added
                                                </a>
                                            @else
                                                <a href="javascript:void(0)"
                                                    class=" btn btn-pink add-to-cart d-flex align-items-center btn-30padding"
                                                    data-p-id="{{ $product->id }}">
                                                    Add To Cart
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <h6 class="h5 font-body">
                                    Description
                                </h6>
                                <ul class="text-muted">
                                    {!! $product->descriptions !!}
                                </ul>
                                <hr>
                                @if ($product_attributes->count())
                                    <div class="my-1">
                                        @forelse ($product_attributes as $product_attribute)
                                            <div class="d-flex gap-2 my-1">
                                                <div>{{ $product_attribute->attribute->name . ' : ' }}</div>
                                                <div class="fw-500">{{ $product_attribute->value->name }}</div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <hr>
                                @endif
                            </div>
                            <div class="rating-holder">
                                <div class="row">
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating">
                                            <div class="d-flex align-items-center">
                                                <h6 class="h5 font-body mb-0 me-2">
                                                    Ratings
                                                </h6>
                                                <div class="five-stars text-green d-flex">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $reviewRatingAvg)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="fa-regular fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="rating-total d-flex align-items-center me-3">
                                                    <h6 class="display-6 text-muted font-body my-2">
                                                        {{ $reviewRatingAvg }}
                                                    </h6>
                                                    <i class="fa-solid fa-star text-green"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 p-0">
                                        <div class="rating-stats text-muted">

                                            @for ($i = 5; $i >= 1; $i--)
                                                <div class="rating-stat">
                                                    <div>{{ $i }}</div>
                                                    <div class="review-bar">
                                                        <div class="review-bar-value"
                                                            style="width: {{ $ratingsArr[$i] }}%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- detial Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product detial of the Page end -->
        <section>
            <div class="container">

                <div class="row">


                    <div class="my-0 py-3 py-lg-0 my-lg-2 col-lg-6 col-md-12 product-showpagepills pills-divider-border">
                        <div class=" d-flex justify-content-start ">
                            <h5 class="main-head tab-fs py-2 pills-divider-h5">Write a Reviews</h5>
                        </div>

                        <div class="tab-content my-4">

                            <div class="">
                                <form action="{{ route('frontend.review.store', $product->slug) }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-between flex-column flex-sm-row gap-1">
                                        <div>Give Your Rating</div>

                                        <div class="rating-input">
                                            <input type="radio" id="star5" name="rating" value="5" />
                                            <label class="star" for="star5" title="Awesome"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star4" name="rating" value="4" />
                                            <label class="star" for="star4" title="Great"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star3" name="rating" value="3" />
                                            <label class="star" for="star3" title="Very good"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star2" name="rating" value="2" />
                                            <label class="star" for="star2" title="Good"
                                                aria-hidden="true"></label>
                                            <input type="radio" id="star1" name="rating" value="1" />
                                            <label class="star" for="star1" title="Bad"
                                                aria-hidden="true"></label>
                                        </div>
                                    </div>
                                    @if ($errors->has('rating'))
                                        <div class="text-danger text-end" role="alert">{{ $errors->first('rating') }}
                                        </div>
                                    @endif

                                    <div class="py-4">
                                        <input type="text"
                                            class="form-control my-2 review-sub-headline review-input-bg"
                                            placeholder="Enter Title" name="title" required
                                            value="{{ old('title') }}">
                                        @if ($errors->has('title'))
                                            <div class="text-danger" role="alert">{{ $errors->first('title') }}
                                            </div>
                                        @endif
                                        <textarea name="body" id="body" cols="10" rows="3"
                                            class="mt-3 form-control w-100  review-sub-textarea review-input-bg" placeholder="Enter Your Review"
                                            minlength="3" maxlength="2000" required>{{ old('body') }}</textarea>
                                        @if ($errors->has('body'))
                                            <div class="text-danger" role="alert">{{ $errors->first('body') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-pink">Post Your Review</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="my-0 my-lg-2 col-lg-6 col-md-12 product-showpagepills pills-divider-border ">

                        <div class="pills-divider d-flex justify-content-start px-0 px-lg-3">
                            <h5 class="main-head tab-fs pills-divider-h5 py-2">Customer Reviews</h5>
                        </div>


                        <div class="tab-content my-4">
                            <div class="tab-pane fade show active" id="home" aria-labelledby="home-tab">
                                <div class="container p-0 px-0 px-lg-3">
                                    @forelse ($reviews as $re)
                                        <div class="review-area">
                                            <div class="review-card ">
                                                <div class="d-flex align-items-center">

                                                    <div class="review-user">
                                                        <img src="{{ $user && $user->profile_image ? asset('storage/images/profile/' . $user->profile_image) : asset('frontend/images/user-pic.png') }}"
                                                            alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="d-flex review-head">
                                                            <div class="five-stars text-green d-flex">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $re->rating)
                                                                        <i class="fa-solid fa-star"></i>
                                                                    @else
                                                                        <i class="fa-regular fa-star"></i>
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            <div class="review-title">
                                                                <h5 class="font-body">
                                                                    {{ $re->title }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="review-content">

                                                    <div class="review-text">
                                                        <p>
                                                            {!! nl2br($re->body) !!}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="review-info text-muted d-flex flex-wrap justify-content-between">
                                                        <div class="py-2">
                                                            {{ $re->user->first_name ?? 'Anonymous' }}
                                                            | {{ dd_format($re->created_at, 'd M-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center my-4">No Reviews</p>
                                    @endforelse
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $reviews->onEachSide(1)->links('pagination::bootstrap-4') }}
                                </div>
                            </div>



                        </div>
                    </div>



                </div>

                <hr>
                {{-- <div class="row pb-4" style="padding-top:2px;">
                    <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">Recommended based on your
                        purchase</h5>
                     @forelse ($cProducts as $cp)
                        <div class="col-lg-12 col-xl-6 or-secondpage-scard">
                            <div class="p-4 or-secondpage-scard">
                                <div class="row pt-3 pb-3 or-secondpage-scard-card">
                                    <div class="col-sm-4 or-secondpage-scard-card-img" style="">
                                        <img src="{{ asset('frontend/images/products/skin/sk1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="col-sm-8 or-secondpage-scard-card-des pt-4 pt-sm-0 pt-md-0">
                                        <h4 class="main-head text-capitalize">{{ $cp->short_descriptions }}</h4>
                                        <p class="text-capitalize">
                                            {{ strip_tags($cp->descriptions) }}
                                        </p>
                                        <ul class="d-flex gap-5 p-0">
                                            <li class="no-bullet fw-bolder">
                                                From {{ $cp->final_price }}
                                            </li>
                                            <li>{{ dd_format($cp->created_at, 'd-m-Y') }}</li>
                                        </ul>
                                    </div>

                                </div>
                                <button type="button" class="btn btn-orange or-secondpage-lbtn mt-4">Continue
                                    Shopping</button>

                            </div>
                        </div>
                    @empty
                        <p class="text-center">No Recommended Products</p>
                    @endforelse
                </div> --}}
                {{-- <div class="d-flex justify-content-center mt-4">
                    {{ $cProducts->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div> --}}


            </div>


        </section>
    </main>

    <div class="container">
        <div class="row">
            <h5 class="main-head py-3 or-secondpage-scard-fhead text-capitalize">
                Recommended Products
            </h5>
            <div class="col-sm-12">

                <ul id="subcategory-slider">

                    @foreach ($relatedProducts as $rP)
                        <div class="product-show-grid my-3 mx-2">

                            <div class="product-show-grid-card">
                                <div class="product-card-img">
                                    @if (in_array($rP->id, $wishlist))
                                        <button class="btn wishlist add-to-wish active" data-p-id="{{ $rP->id }}">
                                            <span class="has-tool-tip">
                                                <i class="fa-regular fa-heart"></i>
                                                <span class="tool-tip-text">Remove From Wishlist</span>
                                            </span>
                                        </button>
                                    @else
                                        <button class="btn wishlist add-to-wish" data-p-id="{{ $rP->id }}">
                                            <span class="has-tool-tip">
                                                <i class="fa-regular fa-heart"></i>
                                                <span class="tool-tip-text">Add to Wishlist</span>
                                            </span>
                                        </button>
                                    @endif
                                    <img src="{{ asset('storage/images/products/thumbnails/' . $rP->thumbnail_image) }}"
                                        alt="...">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title font-head fw-bold" title="{{ $rP->name }}">
                                        <a href="{{ route('frontend.p.show', $rP->slug) }}">
                                            {{ str_limit($rP->name, 50) }}
                                        </a>
                                    </h4>
                                    <div class="price">
                                        ₹{{ $rP->final_price }} <s class="text-danger">₹{{ $rP->mrp }}</s>
                                    </div>
                                    <div class="buttons">
                                        <a href="{{ route('frontend.p.show', $rP->slug) }}" class="btn btn-orange"
                                            title="{{ $rP->name }}">
                                            Shop now
                                        </a>
                                        @if (in_array($rP->id, $productInCart))
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart btn-outline-pink"
                                                data-p-id="{{ $rP->id }}">
                                                <svg class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                                    data-prefix="fas" data-icon="check" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M470.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L192 338.7 425.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                                    </path>
                                                </svg> Added
                                            </a>
                                        @else
                                            <a href="javascript:void(0)" class="btn btn-pink add-to-cart"
                                                data-p-id="{{ $rP->id }}">
                                                Add To Cart
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach


                </ul>


            </div>
        </div>
    </div>

    <style>
        .p-show.add-to-wish {
            border: 0;
        }

        .p-show.add-to-wish.active {
            background: #fff !important;
            color: #ec268f !important;
        }

        .p-show.add-to-wish.active svg path {
            fill: #ec268f;
        }

        .min-h-2-80 {
            height: 80px;
            width: 80px;
        }
    </style>
@endsection
