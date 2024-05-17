<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('register', 'pages.auth.register')
        ->name('register');

    Volt::route('login', 'pages.auth.login')
        ->name('login');

    Volt::route('forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');

    // admin
    Volt::route('admin/register', 'admin.pages.auth.register')
        ->name('admin.register');

    Volt::route('admin/login', 'admin.pages.auth.login')
        ->name('admin.login');
/*
    Volt::route('admin/forgot-password', 'admin.pages.auth.forgot-password')
        ->name('admin.password.request');

    Volt::route('admin/reset-password/{token}', 'admin.pages.auth.reset-password')
        ->name('admin.password.reset');
*/

});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'pages.auth.verify-email')
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Volt::route('confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});


Route::middleware('auth:admin')->group(function () {
    Volt::route('admin/verify-email', 'admin.pages.auth.verify-email')
        ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.verification.verify');

    Volt::route('admin/confirm-password', 'admin.pages.auth.confirm-password')
        ->name('admin.password.confirm');
});