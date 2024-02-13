<?php

use App\Http\Controllers\PageCongroller;
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

// Route::get('/', function () {
//     return view('index');
// });


Route::controller(PageCongroller::class)->prefix('/')->group(function () {
    Route::get('/', 'main')->name('page.main');
    Route::get('/details', 'detail')->name('page.details');
    Route::get('/checkout', 'checkout')->name('page.checkout');
    Route::get('/cart', 'cart')->name('page.cart');
    Route::get('/shop', 'shop')->name('page.shop');
});