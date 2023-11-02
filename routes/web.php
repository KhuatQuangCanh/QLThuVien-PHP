<?php

use App\Http\Controllers\Clients\HomeClientController;
use App\Http\Controllers\Clients\Users\UsersController;
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


Route::prefix('')->name("clients.")->group(function () {

    Route::get('', [HomeClientController::class, 'index'])->name('homeClient');
    Route::get('about', [HomeClientController::class, 'about'])->name('about');
    Route::get('store', [HomeClientController::class, 'store'])->name('store');
    Route::get('contact', [HomeClientController::class, 'contact'])->name('contact');

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('profile', [HomeClientController::class, 'profile'])->name('profile');
        Route::get('cart', [HomeClientController::class, 'cart'])->name('cart');
        Route::get('login', function () {
            return view('clients.layout.block.assets.login');
        })->name('login');
    });
});
Route::prefix('admin')->name('admin.')->group(function () {
});
