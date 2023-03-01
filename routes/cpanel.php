<?php

use Illuminate\Support\Facades\Route;


Route::domain(config('app.cms_domain'))->group(function () {



    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->name('cms.forgotPassword.index');


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', 'App\Http\Controllers\cms\ChangePasswordController@changePassword')->name('cms.changePassword.index');
        Route::get('/change-password/{id}', 'App\Http\Controllers\cms\ChangePasswordController@passwordChange')->name('cms.password.submit');

        Route::get('/', 'App\Http\Controllers\cms\statisticsController@index')->name("cms.statistics.index");
        Route::get('/logout', 'App\Http\Controllers\cms\LoginController@logout')->name("cms.logout");
    });

    require __DIR__ . '/auth.php';
});
