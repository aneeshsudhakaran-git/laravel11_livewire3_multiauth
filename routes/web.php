<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Admin routes start here
Route::view('/admin', 'admin/welcome');

Route::view('admin/dashboard', 'admin/dashboard')
    ->middleware(['auth:admin', 'verified'])
    ->name('admin.dashboard');

Route::view('admin/profile', 'admin/profile')
    ->middleware(['auth:admin'])
    ->name('admin.profile');

/******/
require __DIR__.'/auth.php';
