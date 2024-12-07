<?php

use App\Http\Controllers\Api\Auth\CustomerAuthController;
use App\Http\Controllers\Api\BlogsController;
use App\Http\Controllers\Api\BrandsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentRateController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SlidersController;
use App\Http\Controllers\Api\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('throttle:100,1')->group(function () {

    Route::prefix('faq')->group(function () {
        Route::get('faq', [SettingController::class, 'faq']);
    });

    Route::prefix('contactUs')->group(function () {
        Route::post('contactUs', [SettingController::class, 'contactUs']);
    });

    Route::prefix('political_private')->group(function () {
        Route::get('political_private', [SettingController::class, 'political_private']);
    });


    Route::prefix('galleries')->group(function () {
        Route::get('galleries', [SettingController::class, 'galleries']);
    });
    Route::prefix('about_us')->group(function () {
        Route::get('about_us', [SettingController::class, 'about_us']);
    });
    Route::prefix('partners')->group(function () {
        Route::get('partners', [SettingController::class, 'partners']);
    });
    Route::prefix('info')->group(function () {
        Route::get('info', [SettingController::class, 'info']);
    });

    Route::prefix('color')->group(function () {
        Route::get('colors', [SettingController::class, 'colors']);
    });

    Route::prefix('sizes')->group(function () {
        Route::get('sizes', [SettingController::class, 'sizes']);
    });

    Route::prefix('tags')->group(function () {
        Route::get('tags', [SettingController::class, 'tags']);
    });

    Route::prefix('category')->group(function () {
        Route::get('category', [CategoryController::class, 'index']);
        Route::get('show/{id}', [CategoryController::class, 'show']);
        Route::get('product/{id}', [CategoryController::class, 'product']);
    });

    Route::prefix('brands')->group(function () {
        Route::get('brands', [BrandsController::class, 'index']);
    });


    Route::prefix('products')->group(function () {
        Route::get('products', [ProductController::class, 'index']);
        Route::get('show/{id}', [ProductController::class, 'show']);
        Route::get('product_week', [ProductController::class, 'product_week']);
        Route::get('product_month', [ProductController::class, 'product_month']);
        Route::get('product_last_month', [ProductController::class, 'product_last_month']);
        Route::post('filter_product', [ProductController::class, 'filter_product']);
        Route::get('sort_product', [ProductController::class, 'sort_product']);
        Route::get('related', [ProductController::class, 'related']);
    });


    Route::prefix('sliders')->group(function () {
        Route::get('sliders', [SlidersController::class, 'index']);
        Route::get('show/{id}', [SlidersController::class, 'show']);
    });


    Route::prefix('blogs')->group(function () {
        Route::get('blogs', [BlogsController::class, 'index']);
        Route::get('show/{id}', [BlogsController::class, 'show']);
    });

    Route::middleware('auth:api')->prefix('comment_rate')->group(function () {
        Route::post('rate', [CommentRateController::class, 'rate']);
        Route::post('comment', [CommentRateController::class, 'comment']);
    });


    Route::middleware('auth:api')->group(function () {
        Route::prefix('comment_rate')->group(function () {
            Route::post('rate', [CommentRateController::class, 'rate']);
            Route::post('comment', [CommentRateController::class, 'comment']);
        });


        Route::prefix('orders')->group(function () {
            Route::get('get_orders', [OrdersController::class, 'get_orders']);
            Route::post('store', [OrdersController::class, 'store']);
            Route::get('details', [OrdersController::class, 'details']);
            Route::post('status_order', [OrdersController::class, 'status_order']);
        });

        Route::prefix('wallet')->group(function () {
            Route::post('wallet/credit', [WalletController::class, 'credit']);
            Route::post('wallet/debit', [WalletController::class, 'debit']);
        });


    });
});


Route::prefix('auth')->group(function () {
    Route::post('login_phone', [CustomerAuthController::class, 'login_phone']);
    Route::post('login', [CustomerAuthController::class, 'login']);
    Route::post('register', [CustomerAuthController::class, 'register']);
    Route::get('me', [CustomerAuthController::class, 'me']);
    Route::get('logout', [CustomerAuthController::class, 'logout']);
    Route::get('refresh', [CustomerAuthController::class, 'refresh']);
    Route::post('editProfile', [CustomerAuthController::class, 'editProfile']);
});


