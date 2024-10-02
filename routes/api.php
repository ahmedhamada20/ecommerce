<?php

use App\Http\Controllers\Api\Auth\CustomerAuthController;
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

Route::prefix('auth')->group(function () {
   Route::post('login_phone', [CustomerAuthController::class,'login_phone']);
   Route::post('login', [CustomerAuthController::class,'login']);
   Route::post('register', [CustomerAuthController::class,'register']);
   Route::get('me', [CustomerAuthController::class,'me']);
   Route::get('logout', [CustomerAuthController::class,'logout']);
   Route::get('refresh', [CustomerAuthController::class,'refresh']);
   Route::post('editProfile', [CustomerAuthController::class,'editProfile']);
});
