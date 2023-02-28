<?php

use Illuminate\Support\Facades\Route;


Route::domain(config('app.cms_domain'))->group(function () {



    Route::get("/login", 'App\Http\Controllers\cms\LoginController@loginShow')->name('cms.login');
    Route::post("/login", 'App\Http\Controllers\cms\LoginController@login')->name('cms.login.submit');

    Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->name('cms.forgotPassword.index');


    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', [changePasswordController::class, 'changePassword'])->name('cms.changePassword.index');
        Route::put('/change-password/{id}', [changePasswordController::class, 'passwordChange'])->name('cms.password.submit');

        Route::get('/', 'App\Http\Controllers\cms\statisticsController@index')->name("cms.statistics.index");
        Route::get('/logout', [LoginController::class, 'logout'])->name("cms.logout");
    });

    require __DIR__ . '/auth.php';

});
