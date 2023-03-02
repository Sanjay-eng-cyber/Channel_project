<?php

use Illuminate\Support\Facades\Route;


Route::domain(config('app.cms_domain'))->group(function () {


    require __DIR__ . '/auth.php';

    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', 'App\Http\Controllers\cms\ForgotPasswordController@index')->name('cms.forgotPassword.index');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', 'App\Http\Controllers\cms\ChangePasswordController@changePassword')->name('cms.changePassword.index');
        Route::post('/change-password/{id}', 'App\Http\Controllers\cms\ChangePasswordController@passwordChange')->name('cms.password.submit');

        Route::get('/logout', 'App\Http\Controllers\cms\LoginController@logout')->name("cms.logout");

        Route::get('/', 'App\Http\Controllers\cms\statisticsController@index')->name("cms.statistics.index");

        Route::get('categories/', 'App\Http\Controllers\cms\CategoryController@index')->name('backend.category.index');
        Route::get('/category/show/{id}', 'App\Http\Controllers\cms\CategoryController@show')->name("backend.category.show");
        Route::get('category/create', 'App\Http\Controllers\cms\CategoryController@create')->name('backend.category.create');
        Route::post('category/store', 'App\Http\Controllers\cms\CategoryController@store')->name('backend.category.store');
        Route::get('category/edit/{id}', 'App\Http\Controllers\cms\CategoryController@edit')->name('backend.category.edit');
        Route::post('category/update/{id}', 'App\Http\Controllers\cms\CategoryController@update')->name('backend.category.update');
        Route::get('category/delete/{id}', 'App\Http\Controllers\cms\CategoryController@destroy')->name('backend.category.destroy');

        Route::get('brands/', 'App\Http\Controllers\cms\BrandController@index')->name('backend.brand.index');
        Route::get('/brand/show/{id}', 'App\Http\Controllers\cms\BrandController@show')->name("backend.brand.show");
        Route::get('brand/create', 'App\Http\Controllers\cms\BrandController@create')->name('backend.brand.create');
        Route::post('brand/store', 'App\Http\Controllers\cms\BrandController@store')->name('backend.brand.store');
        Route::get('brand/edit/{id}', 'App\Http\Controllers\cms\BrandController@edit')->name('backend.brand.edit');
        Route::post('brand/update/{id}', 'App\Http\Controllers\cms\BrandController@update')->name('backend.brand.update');
        Route::get('brand/delete/{id}', 'App\Http\Controllers\cms\BrandController@destroy')->name('backend.brand.destroy');

        Route::get('sub_categories/', 'App\Http\Controllers\cms\SubCategoryController@index')->name('backend.sub_category.index');
        Route::get('/sub_category/show/{id}', 'App\Http\Controllers\cms\SubCategoryController@show')->name("backend.sub_category.show");
        Route::get('sub_category/create', 'App\Http\Controllers\cms\SubCategoryController@create')->name('backend.sub_category.create');
        Route::post('sub_category/store', 'App\Http\Controllers\cms\SubCategoryController@store')->name('backend.sub_category.store');
        Route::get('sub_category/edit/{id}', 'App\Http\Controllers\cms\SubCategoryController@edit')->name('backend.sub_category.edit');
        Route::post('sub_category/update/{id}', 'App\Http\Controllers\cms\SubCategoryController@update')->name('backend.sub_category.update');
        Route::get('sub_category/delete/{id}', 'App\Http\Controllers\cms\SubCategoryController@destroy')->name('backend.sub_category.destroy');

        Route::get('attributes/', 'App\Http\Controllers\cms\AttributeController@index')->name('backend.attribute.index');
        Route::get('/attribute/show/{id}', 'App\Http\Controllers\cms\AttributeController@show')->name("backend.attribute.show");
        Route::get('attribute/create', 'App\Http\Controllers\cms\AttributeController@create')->name('backend.attribute.create');
        Route::post('attribute/store', 'App\Http\Controllers\cms\AttributeController@store')->name('backend.attribute.store');
        Route::get('attribute/edit/{id}', 'App\Http\Controllers\cms\AttributeController@edit')->name('backend.attribute.edit');
        Route::post('attribute/update/{id}', 'App\Http\Controllers\cms\AttributeController@update')->name('backend.attribute.update');
        Route::get('attribute/delete/{id}', 'App\Http\Controllers\cms\AttributeController@destroy')->name('backend.attribute.destroy');

        Route::get('product_attribute_values/', 'App\Http\Controllers\cms\ProductAttributeController@index')->name('backend.product_attribute_value.index');
        Route::get('/product_attribute_value/show/{id}', 'App\Http\Controllers\cms\ProductAttributeController@show')->name("backend.product_attribute_value.show");
        Route::get('product_attribute_value/create', 'App\Http\Controllers\cms\ProductAttributeController@create')->name('backend.product_attribute_value.create');
        Route::post('product_attribute_value/store', 'App\Http\Controllers\cms\ProductAttributeController@store')->name('backend.product_attribute_value.store');
        Route::get('product_attribute_value/edit/{id}', 'App\Http\Controllers\cms\ProductAttributeController@edit')->name('backend.product_attribute_value.edit');
        Route::post('product_attribute_value/update/{id}', 'App\Http\Controllers\cms\ProductAttributeController@update')->name('backend.product_attribute_value.update');
        Route::get('product_attribute_value/delete/{id}', 'App\Http\Controllers\cms\ProductAttributeController@destroy')->name('backend.product_attribute_value.destroy');

        Route::get('coupons/', 'App\Http\Controllers\cms\CouponController@index')->name('backend.coupon.index');
        Route::get('/coupon/show/{id}', 'App\Http\Controllers\cms\CouponController@show')->name("backend.coupon.show");
        Route::get('coupon/create', 'App\Http\Controllers\cms\CouponController@create')->name('backend.coupon.create');
        Route::post('coupon/store', 'App\Http\Controllers\cms\CouponController@store')->name('backend.coupon.store');
        Route::get('coupon/edit/{id}', 'App\Http\Controllers\cms\CouponController@edit')->name('backend.coupon.edit');
        Route::post('coupon/update/{id}', 'App\Http\Controllers\cms\CouponController@update')->name('backend.coupon.update');
        Route::get('coupon/delete/{id}', 'App\Http\Controllers\cms\CouponController@destroy')->name('backend.coupon.destroy');
    });
});
