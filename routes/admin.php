<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
require __DIR__.'/auth.php';

Route::get('/',[AdminController::class,'index'])->name('admin.index');
Route::get('/setting',[AdminController::class,'setting'])->name('admin.setting');
Route::post('/setting_update',[AdminController::class,'setting_update'])->name('admin.setting_update');
Route::resource('color',ColorController::class);
Route::resource('sizes',SizeController::class);
Route::resource('tags',TagsController::class);
Route::resource('category',CategoryController::class);
Route::post('status_category', [CategoryController::class, 'status_category'])->name('status_category');
Route::resource('brands',BrandController::class);
Route::post('status_Brand', [BrandController::class, 'status_Brand'])->name('status_Brand');

