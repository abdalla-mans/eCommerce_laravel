<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ShopPagesController;

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

// page routes
Route::controller(PageController::class)->prefix('page')->group(function () {
    Route::get('/details/{id}', 'detail')->where('id', '[0-9]+')->name('page.detail');
    Route::get('/shop', 'shop')->name('page.shop');
    Route::view('/checkout', 'checkout')->name('page.checkout')->middleware('auth');
    Route::view('/cart', 'cart')->name('page.cart')->middleware('auth');
});

// Route::get('/shop', ShopPagesController::class)->name('page.shop');
