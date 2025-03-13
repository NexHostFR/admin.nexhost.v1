<?php

use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [AuthPageController::class, "viewLogin"])->name('login');
    Route::post('/auth/login', [AuthPageController::class, "postLogin"]);
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [AuthPageController::class, "logout"])->name('logout');

    Route::get('/', [DashboardController::class, "landingPage"])->name('dashboard');
});