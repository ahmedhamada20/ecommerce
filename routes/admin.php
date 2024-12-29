<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('admin.index');
});


//Route::middleware(['auth','admin_try'])->group(function (){
    Route::resource('users',UsersController::class);
    Route::resource('addresses', AddressController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('currencies', CurrencyController::class);
    Route::resource('coupons', CouponController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('rewards', RewardController::class);
    Route::resource('sliders', SliderController::class);
//});
