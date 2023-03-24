<?php

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

    Route::get('/', function () {
        return view('frontend.index');
    })->name('index');

    Route::get('/profile', function () {
        return view('frontend.profile');
    })->name('profile');

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


    Route::get('/about-us', function () {
        return view('frontend/layouts/about-us');
    })->name('about');

    Route::get('/contact-us', function () {
        return view('frontend/layouts/contact-us');
    })->name('contact');

    Route::get('/products', function () {
        return view('frontend/product/index');
    })->name('products');

    Route::get('/products/{slug}', function () {
        return view('frontend/product/show');
    })->name('products.show');

});
