<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertisementBannersController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\InstallmentsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RewardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SpecialProductsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
require __DIR__ . '/auth.php';

//admin_try
Route::get('/users_index',function (){
   return view('admin.users.index_ar');
});



    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale() . '/admin',
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ,'admin'],
            'as'=>'admin_',
        ], function(){

        Route::get('/', [AdminController::class, 'index']);
        Route::resource('users', UsersController::class);
        Route::resource('addresses', AddressController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('currencies', CurrencyController::class);
        Route::resource('coupons', CouponController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('rewards', RewardController::class);
        Route::resource('sliders', SliderController::class);
        Route::resource('tags', TagsController::class);
        Route::resource('installments', InstallmentsController::class);
        Route::resource('advertisement_banners', AdvertisementBannersController::class);
        Route::resource('special_products', SpecialProductsController::class);
        Route::resource('orders', OrdersController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::post('/update-brand-status', [BrandController::class, 'updateBrandStatus'])->name('updateBrandStatus');
        Route::post('/update-users-status', [UsersController::class, 'updateUsersStatus'])->name('updateUsersStatus');
        Route::post('/update-sliders-status', [SliderController::class, 'updateSlidersStatus'])->name('updateSlidersStatus');
        Route::post('/update-currencies-status', [CurrencyController::class, 'updateCountryStatus'])->name('updateCountryStatus');
        Route::post('/update-blogs-status', [BlogController::class, 'updateBlogsStatus'])->name('updateBlogsStatus');
        Route::post('/update-comments-status', [BlogController::class, 'updateCommentsStatus'])->name('updateCommentsStatus');
        Route::get('/deleted-comments/{id}', [BlogController::class, 'deletedComments'])->name('deletedComments');
        Route::post('hyperLink', [AdminController::class, 'hyperLink'])->name('hyperLink');
        Route::post('hyperLink_edit', [AdminController::class, 'hyperLink_edit'])->name('hyperLink_edit');
        Route::post('hyperLink_deleted', [AdminController::class, 'hyperLink_deleted'])->name('hyperLink_deleted');
        Route::post('/update-coupons-status', [CouponController::class, 'updateCouponStatus'])->name('updateCouponStatus');
        Route::post('/update-categories-status', [CategoryController::class, 'updateCategoryStatus'])->name('updateCategoryStatus');
        Route::post('/update-rewards-status', [RewardController::class, 'updateRewardsStatus'])->name('updateRewardsStatus');
        Route::post('/update-installments-status', [InstallmentsController::class, 'updateInstallmentStatus'])->name('updateInstallmentStatus');
        Route::post('/update-advertisement_banners-status', [AdvertisementBannersController::class, 'updateAdvertisementBannersStatus'])->name('updateAdvertisementBannersStatus');
        Route::get('orders/details/{id}',[OrdersController::class,'show'])->name('orders/details');


});
