<?php

use App\Http\Controllers\Front\HomeController;
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
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
    Route::get('/blog/detail/{id}', [HomeController::class, 'blog_detail'])->name('home.blog_detail');
    Route::get('category/{id}',[HomeController::class,'category'])->name('category');

});



