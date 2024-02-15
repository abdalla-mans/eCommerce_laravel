<?php

use App\Http\Controllers\ViewPageController;
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

// page routes
Route::view('/', 'index')->name('page.main');
Route::view('/detail', 'detail')->name('page.detail');
Route::view('/checkout', 'checkout')->name('page.checkout');
Route::view('/cart', 'cart')->name('page.cart');
Route::view('/shop', 'shop')->name('page.shop');

// logs routes
Route::view('/login', 'logs.login')->name('page.login');
Route::view('/logout', 'logs.logout')->name('page.logout');
Route::view('/register', 'logs.register')->name('page.register');
