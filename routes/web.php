<?php

use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Clients\AccountsController;
use App\Http\Controllers\Clients\HomeClientController;
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

    Route::get('/', [HomeClientController::class, 'index'])->name('homeClient');
    Route::get('/about', [HomeClientController::class, 'about'])->name('about');
    Route::get('/store', [HomeClientController::class, 'store'])->name('store');
    Route::get('/contact', [HomeClientController::class, 'contact'])->name('contact');

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/profile/{id}', [AccountsController::class, 'profile'])->name('profile');

        Route::get('/cart', [AccountsController::class, 'cart'])->name('cart');

        Route::get('/login', [AccountsController::class, 'login'])->name('login');
        Route::post('/login', [AccountsController::class, 'postLogin'])->name('post-login');

        Route::get('/logout', [AccountsController::class, 'logout'])->name('logout');

        Route::get('/register', [AccountsController::class, 'register'])->name('register');
        Route::post('/register', [AccountsController::class, 'postRegister'])->name('post-register');
    });
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [HomeAdminController::class, 'index'])->name('home');

    Route::get('/template-table', [HomeAdminController::class, 'table'])->name('template-table');
});
