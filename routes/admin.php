<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductCategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProductCouponController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CustomerAddressController;
use App\Http\Controllers\Admin\ShippingCompanyController;
use App\Http\Controllers\Admin\PaymentMethodController;

Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {

  Route::get('/login', [AdminController::class, 'login'])->name('login')->middleware('guest');
  Route::get('/forgot-password', [AdminController::class, 'forgot-password'])->name('forgotPassword');

  Route::group(['middleware' => 'roles', 'role:admin|supervisor'], function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    Route::get('/account_settings', [AdminController::class, 'account_settings'])->name('account_settings');
    Route::post('/products/remove-image', [ProductController::class, 'remove_image'])->name('products.remove_image');
    Route::get('/customer/get_customers', [CustomerController::class, 'get_customers'])->name('get_customers');
    Route::get('/stat/get_states', [StateController::class, 'get_states'])->name('get_states');
    Route::get('/city/get_cities', [CityController::class, 'get_cities'])->name('get_cities');
    Route::patch('/account_settings', [AdminController::class, 'update_account_settings'])->name('update_account_settings');

    Route::resource('product_categories', ProductCategoriesController::class);
    Route::resource('products', ProductController::class);
    Route::resource('tags', TagController::class);
    Route::resource('product_coupons', ProductCouponController::class);
    Route::resource('product_reviews', ProductReviewController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('customer_addresses', CustomerAddressController::class);
    Route::resource('shipping_companies', ShippingCompanyController::class);
    Route::resource('payment_methods', PaymentMethodController::class);

    // Route::get('/cities/get_cities', function () {
    //   dd('dsf');
    // })->name('get_cities');
  });
});
