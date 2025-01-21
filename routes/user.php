<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/user',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'user'],
        'as' => 'user_',
    ], function () {


    Route::get('/', [HomeController::class, 'index']);
    Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
    Route::get('orders/details/{id}',[HomeController::class,'show'])->name('orders/details');
    Route::get('user_profile',[HomeController::class,'user_profile'])->name('profile');
    Route::get('coupon_user',[HomeController::class,'coupon_user'])->name('coupon');
    Route::get('coupon_user_order/{id}',[HomeController::class,'coupon_user_order'])->name('coupon_order');
    Route::get('wishlists',[HomeController::class,'wishlists'])->name('wishlists');
    Route::get('comparisons',[HomeController::class,'comparisons'])->name('comparisons');
    Route::get('carts',[HomeController::class,'carts'])->name('carts');
});

