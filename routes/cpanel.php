<?php

use Illuminate\Support\Facades\Route;


Route::domain(config('app.cms_domain'))->group(function () {

    require __DIR__ . '/auth.php';

    Route::post("/login", [LoginController::class, 'login'])->name('cms.login.submit');
    Route::get('/login', [LoginController::class, 'loginShow'])->name('cms.login');

    Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->name('cms.forgotPassword.index');

    Route::group(['middleware' => 'auth:admin'], function () {

        Route::get('/change-password', [changePasswordController::class, 'changePassword'])->name('cms.changePassword.index');
        Route::put('/change-password/{id}', [changePasswordController::class, 'passwordChange'])->name('cms.password.submit');
        Route::get('/logout', [LoginController::class, 'logout'])->name("cms.logout");
    });
});
