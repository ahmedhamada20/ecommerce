<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SliderController;
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
Route::resource('products',ProductController::class);
Route::post('status_products', [ProductController::class, 'status_products'])->name('status_products');
Route::post('status_cemment', [ProductController::class, 'status_cemment'])->name('status_cemment');
Route::post('products_deleted_comment', [ProductController::class, 'products_deleted_comment'])->name('products_deleted_comment');
Route::post('add_quantity', [ProductController::class, 'addQuantity'])->name('add_quantity');
Route::post('add_image_color_products',[ProductController::class,'add_image_color_products'])->name('add_image_color_products');
Route::get('get_cemment/{id}',[ProductController::class,'get_cemment'])->name('get_cemment');
Route::resource('sliders',SliderController::class);
Route::resource('blogs',BlogsController::class);
Route::post('status_blogs', [BlogsController::class, 'status_blogs'])->name('status_blogs');


