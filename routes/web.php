<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dash\UserController;
use App\Http\Controllers\Dash\ProductController;
use App\Http\Controllers\Dash\DashboardController;

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

Route::get('/', function () {
    $products = Product::with('images')->limit(8)->inRandomOrder()->get();
    return view('index', compact('products'));
})->name('page.main');

Route::prefix('/dashboard_admin')->middleware(['auth', 'admin', 'verified'])->as('dash.')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'main')->name('main');
        // Route::get('/pagination_count', 'pagination_count')->name('pagination_count');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products');
    });

    Route::resource('users', UserController::class)->middleware('super_admin');
    // now admin can only read users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/old_web.php';
require __DIR__ . '/auth.php';



Route::get('/test', function () {
    alert()->info('InfoAlert', 'Lorem ipsum dolor sit amet.');
    return view('welcome');
});
