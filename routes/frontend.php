<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PaymentController;

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/shop/{slug?}', [FrontendController::class, 'shop'])->name('shop');
    Route::get('/shop/tags/{slug}', [FrontendController::class, 'shop_tag'])->name('shop_tag');
    Route::get('/product/{slug}', [FrontendController::class, 'product'])->name('product');
    Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');
    Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');

    Route::group(['middleware' => ['roles', 'role:customer']], function () {
        Route::get('/dashboard', [Frontend\CustomerController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('/profile', [Frontend\CustomerController::class, 'profile'])->name('customer.profile');
        Route::patch('/profile', [Frontend\CustomerController::class, 'update_profile'])->name('customer.update_profile');
        Route::get('/profile/remove-image', [Frontend\CustomerController::class, 'remove_profile_image'])->name('customer.remove_profile_image');
        Route::get('/addresses', [Frontend\CustomerController::class, 'addresses'])->name('customer.addresses');
    
        Route::get('/orders', [Frontend\CustomerController::class, 'orders'])->name('customer.orders');
    
        Route::group(['middleware' => 'check_cart'], function () {
            Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
            Route::post('/checkout/payment', [PaymentController::class, 'checkout_now'])->name('checkout.payment');
            Route::get('/checkout/{order_id}/cancelled', [PaymentController::class, 'cancelled'])->name('checkout.cancel');
            Route::get('/checkout/{order_id}/completed', [PaymentController::class, 'completed'])->name('checkout.complete');
            Route::get('/checkout/webhook/{order?}/{env?}', [PaymentController::class, 'webhook'])->name('checkout.webhook.ipn');
        });
    
    });

});
