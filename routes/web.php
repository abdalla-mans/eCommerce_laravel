<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\ProfileController;

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
    $products = Product::limit(8)->inRandomOrder()->get();
    return view('index', compact('products'));
})->name('page.main');

Route::prefix('/dashboard_admin')->controller(AdminDashboard::class)->middleware(['auth', 'admin', 'verified'])->as('dash.')->group(function () {
    Route::get('/', 'main')->name('main');
    Route::get('/products', 'products')->name('products');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/old_web.php';
require __DIR__ . '/auth.php';


