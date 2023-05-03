<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(config('app.web_domain'))->group(function () {

    // Route::get('/', function () {
    //     return view('frontend.index');
    // })->name('index');
    Route::get('/', 'App\Http\Controllers\frontend\HomeController@index')->name('index');
    Route::get('/checkout', function () {
        return view('frontend.checkout');
    })->name('checkout');


    Route::post('send-otp', 'App\Http\Controllers\frontend\LoginController@sendOtp')->name('frontend.send-otp');
    Route::post('verify-otp', 'App\Http\Controllers\frontend\LoginController@verifyOtp')->name('frontend.verify-otp');

    Route::group(['middleware' => 'auth:web'], function () {

        // Route::get('/profile', function () {
        //     return view('frontend.profile');
        // })->name('frontend.profile');
        Route::get('/profile', 'App\Http\Controllers\frontend\ProfileController@index')->name('frontend.profile');
        Route::post('/profile/update', 'App\Http\Controllers\frontend\ProfileController@update')->name('frontend.profile.update');
        Route::post('/address/update', 'App\Http\Controllers\frontend\AddressController@update')->name('frontend.address.update');
        Route::get('/address/delete/{id}', 'App\Http\Controllers\frontend\AddressController@destroy')->name('frontend.address.delete');
        Route::post('/logout', 'App\Http\Controllers\frontend\LoginController@logout')->name('frontend.logout');
    });


    Route::get('/wishlist', function () {
        return view('frontend.wishlist');
    })->name('wishlist');

    Route::get('/order', function () {
        return view('frontend.order');
    })->name('order');

    Route::get('/not-yet-shipped', function () {
        return view('frontend.not-yet-shipped');
    })->name('not-yet-shipped');

    Route::get('/buy-again', function () {
        return view('frontend.buy-again');
    })->name('buy-again');

    Route::get('/cancelled-orders', function () {
        return view('frontend.cancelled-orders');
    })->name('cancelled-orders');

    Route::get('/return-order-first', function () {
        return view('frontend.return-order-first');
    })->name('return-order-first');

    Route::get('/return-order-second', function () {
        return view('frontend.return-order-second');
    })->name('return-order-second');

    Route::get('/cancel-order-first', function () {
        return view('frontend.cancel-order-first');
    })->name('cancel-order-first');

    Route::get('/cancel-order-second', function () {
        return view('frontend.cancel-order-second');
    })->name('cancel-order-second');

    Route::get('/order-tracking-first', function () {
        return view('frontend.order-tracking-first');
    })->name('order-tracking-first');

    Route::get('/order-details', function () {
        return view('frontend.order-details');
    })->name('order-details');

    Route::get('/write-review', function () {
        return view('frontend.write-review');
    })->name('write-review');


    Route::get('/review-index', function () {
        return view('frontend.review-index');
    })->name('review-index');

    Route::get('/review-show', function () {
        return view('frontend.review-show');
    })->name('review-show');


    Route::get('/gift-card', function () {
        return view('frontend.gift-card');
    })->name('gift-card');

    Route::get('/gift-card-index', function () {
        return view('frontend.gift-card-index');
    })->name('gift-card-index');

    Route::get('/profile-payment-method', function () {
        return view('frontend.inside-profile-payment-method');
    })->name('profile-payment-method');

    Route::get('/cart', function () {
        return view('frontend.cart');
    })->name('cart');

    Route::get('/gift-card-review', function () {
        return view('frontend.gift-card-review');
    })->name('gift-card-review');

    Route::get('/about-us', function () {
        return view('frontend/layouts/about-us');
    })->name('about');

    Route::get('/contact-us', function () {
        return view('frontend/layouts/contact-us');
    })->name('contact');

    // Product page
    Route::get('/skin', function () {
        return view('frontend.product.skin-care.index');
    })->name('skin');

    Route::get('/fragrances', function () {
        return view('frontend.product.fragrances.index');
    })->name('fragrances');

    // end product page
    Route::get('/products', function () {
        return view('frontend/product/index');
    })->name('products');

    // Route::get('/products/{slug}', function () {
    //     return view('frontend/product/show');
    // })->name('products.show');

    Route::get('/c/{slug}', 'App\Http\Controllers\frontend\CategoryController@show')->name('frontend.cat.show');
    Route::get('/p/{slug}', 'App\Http\Controllers\frontend\ProductController@show')->name('frontend.p.show');
    Route::post('/p/review/{product_slug}', 'App\Http\Controllers\frontend\ReviewController@store')->name('frontend.p.store');
});
