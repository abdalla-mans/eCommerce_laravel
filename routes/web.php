<?php

use App\Http\Controllers\PageController;
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

Route::controller(PageController::class)->prefix('/')->group(function () {
    // page routes
    Route::get('/', 'main')->name('page.main');
    Route::get('/details/{id}', 'detail')->name('page.detail');
    Route::get('/checkout', 'checkout')->name('page.checkout');
    Route::get('/cart', 'cart')->name('page.cart');
    Route::get('/shop', 'shop')->name('page.shop');

    // logs routes
    Route::get('/login', 'login')->name('page.login');
    Route::get('/logout', 'logout')->name('page.logout');
    Route::get('/register', 'register')->name('page.register');
});
