<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/shop/{slug?}', [FrontendController::class, 'shop'])->name('shop');
    Route::get('/shop/tags/{slug}', [FrontendController::class, 'shop_tag'])->name('shop_tag');
    Route::get('/product/{slug}', [FrontendController::class, 'product'])->name('product');
    Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

});
