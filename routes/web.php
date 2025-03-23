<?php

use App\Http\Controllers\AuthPageController;
use App\Http\Controllers\CategorysPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\TicketPageController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/auth/login', [AuthPageController::class, "viewLogin"])->name('login');
    Route::post('/auth/login', [AuthPageController::class, "postLogin"]);
});

Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [AuthPageController::class, "logout"])->name('logout');

    Route::get('/', [DashboardController::class, "landingPage"])->name('dashboard');

    Route::get('/tickets/view/{id}', [TicketPageController::class, "viewTicket"])->name('ticket');
    Route::post('/tickets/view/{id}', [TicketPageController::class, "postResponseTicket"]);

    // Gestion des users
    Route::get("/users", [UserPageController::class, "viewUserListe"]);
    Route::get("/users/create", [UserPageController::class, "viewUserCreate"]);
    Route::post("/users/create", [UserPageController::class, "postUser"]);
    Route::get("/users/{id}", [UserPageController::class, "viewUser"]);
    Route::post("/users", [UserPageController::class, "updateUser"]);
    Route::get("/users/delete/{id}", [UserPageController::class, "deleteUser"]);

    // Section Categorie de produits
    Route::get("/products/category", [CategorysPageController::class, "viewCategoryListe"]);
    Route::get("/products/category/create", [CategorysPageController::class, "viewCategoryCreate"]);
    Route::post("/products/category/create", [CategorysPageController::class, "postCategory"]);
    Route::get("/products/category/{id}", [CategorysPageController::class, "viewCategory"]);
    Route::post("/products/category/{id}", [CategorysPageController::class, "updateCategory"]);
    Route::get("/products/category/delete/{id}", [CategorysPageController::class, "deleteCategory"]);

    // Section produits
    Route::get("/products", [ProductPageController::class, "viewProductListe"]);
    Route::get("/products/create", [ProductPageController::class, "viewProductCreate"]);
    Route::post("/products/create", [ProductPageController::class, "postProduct"]);
    Route::get("/products/{id}", [ProductPageController::class, "viewProduct"]);
    Route::post("/products/{id}", [ProductPageController::class, "updateProduct"]);
    Route::get("/products/delete/{id}", [ProductPageController::class, "deleteProduct"]);

    // Section code promos
    Route::get("/products/promo", [ProductPageController::class, "viewPromoListe"]);
    Route::get("/products/promo/create", [ProductPageController::class, "viewPromoCreate"]);
    Route::post("/products/promo/create", [ProductPageController::class, "postPromo"]);
});