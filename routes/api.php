<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentsRateController;
use App\Http\Controllers\Api\CurrenciesController;
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

Route::group(['middleware' => ['api', 'HandleApiExceptions']], function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthenticationController::class, 'register']);
        Route::post('login', [AuthenticationController::class, 'login']);
        Route::post('logout', [AuthenticationController::class, 'logout']);
        Route::post('refresh', [AuthenticationController::class, 'refresh']);
        Route::post('profile', [AuthenticationController::class, 'profile']);
        Route::post('edit_profile', [AuthenticationController::class, 'edit_profile']);
    });
});


Route::group(['middleware' => ['api', 'HandleApiExceptions']], function () {
    Route::middleware('auth:api')->group(function () {
        Route::prefix('address')->group(function () {
            // Address Users
            Route::get('address_users', [AddressController::class, 'index']);
            Route::post('create', [AddressController::class, 'create']);
        });

        Route::prefix('comments')->group(function () {
            Route::post('comments_rate', [CommentsRateController::class, 'store']);
        });

    });

    // Blogs
    Route::prefix('blogs')->group(function () {
        Route::get('index', [BlogController::class, 'index']);
        Route::get('show/{slug}', [BlogController::class, 'show']);
    });
    // currencies
    Route::prefix('currencies')->group(function () {
        Route::get('index', [CurrenciesController::class, 'index']);
    });
    // categories
    Route::prefix('categories')->group(function () {
        Route::get('index', [CategoryController::class, 'index']);
        Route::get('show/{slug}', [CategoryController::class, 'show']);
    });

    // brands
    Route::prefix('brands')->group(function () {
        Route::get('index', [BrandController::class, 'index']);
        Route::get('show/{slug}', [BrandController::class, 'show']);
    });

});

