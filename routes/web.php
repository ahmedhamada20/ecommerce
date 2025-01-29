<?php

use App\Http\Controllers\Admin\GoogleAuthController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\SocialShareButtonsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\ChatController;
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
Route::get('/social-media-share', [SocialShareButtonsController::class,'ShareWidget']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
        Route::get('/blog/detail/{id}', [HomeController::class, 'blog_detail'])->name('home.blog_detail');
        Route::get('category/{id}', [HomeController::class, 'category'])->name('category');
        Route::get('/shop', [HomeController::class, 'products'])->name('shop');
        Route::get('/shop/{slug}', [HomeController::class, 'products_details'])->name('shop_details');
        Route::get('/contactUs', [HomeController::class, 'contactUs'])->name('contactUs');
        Route::post('/post_contactUs', [HomeController::class, 'post_contactUs'])->name('post_contactUs');
        Route::get('/aboutsUs', [HomeController::class, 'aboutsUs'])->name('aboutsUs');
        Route::get('/viewCart', [HomeController::class, 'viewCart'])->name('viewCart');
        Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
        Route::post('/addTocart', [HomeController::class, 'addTocart'])->name('addTocart');
        Route::post('/storeorder', [HomeController::class, 'storeorder'])->name('storeorder');


        Route::post('/cart/update/{rowId}', function (Request $request, $rowId) {
            $quantity = $request->quantity;  
            Cart::update($rowId, $quantity);
            $item = Cart::get($rowId);
            $totalPrice = $item->price * $item->qty;
                    return response()->json([
                'totalPrice' => number_format($totalPrice, 2)
            ]);
        })->name('updateCartQuantity');
        
        Route::post('/addTowishlists', [HomeController::class, 'addTowishlists'])->name('addTowishlists');
        Route::post('/addToComparisons', [HomeController::class, 'addToComparisons'])->name('addToComparisons');
        Route::get('/delete/cart/{id}', [HomeController::class, 'delete_addTocart'])->name('delete_addTocart');
        Route::get('/delete/wishlists/{id}', [HomeController::class, 'delete_wishlists'])->name('delete_wishlists');
        Route::get('/delete/comparisons/{id}', [HomeController::class, 'delete_comparisons'])->name('delete_comparisons');


        Route::get('chat/{chatId}', [HomeController::class, 'showChat']);
        Route::post('chat/{chatId}/message', [HomeController::class, 'sendMessage']);
        

        Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
        Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('auth.google.callback');
    }
);



