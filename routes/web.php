<?php

use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Clients\BookController;
use App\Http\Controllers\Clients\CartController;
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
    Route::get('/bookcase', [HomeClientController::class, 'bookcase'])->name('bookcase');
    Route::get('/contact', [HomeClientController::class, 'contact'])->name('contact');

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/profile/{id}', [AccountsController::class, 'profile'])->name('profile');
        Route::get('/profile/edit-profile/{id}', [AccountsController::class, 'getEditProfile'])->name('edit-profile');
        Route::post('/profile/post-edit-profile/{id}', [AccountsController::class, 'postEditProfile'])->name('post-edit-profile');
        Route::post('/profile/post-change-password/{id}', [AccountsController::class, 'postChangePassword'])->name('post-change-password');
        Route::get('/cart', [AccountsController::class, 'cart'])->name('cart');
        Route::get('/login', [AccountsController::class, 'login'])->name('login');
        Route::post('/login', [AccountsController::class, 'postLogin'])->name('post-login');
        Route::get('/logout', [AccountsController::class, 'logout'])->name('logout');
        Route::get('/register', [AccountsController::class, 'register'])->name('register');
        Route::post('/register', [AccountsController::class, 'postRegister'])->name('post-register');
    });

    Route::prefix('/book')->name('books.')->group(function () {
        Route::get('/danh-muc-sach', [BookController::class, 'getAllBook'])->name('index');
        Route::get('/tim-sach/{id}', [BookController::class, 'getBookById'])->name('getBookById');
        Route::get('/tim-sach/the-loai/{idTL}', [BookController::class, 'getBooksByGenre'])->name('getBooksByGenre');
        Route::get('/tu-sach/tim-sach/the-loai/{idTL}', [BookController::class, 'getBooksByGenreForBookCase'])->name('getBooksByGenreForBookCase');
        Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addtocart');
    });
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('home');
    Route::get('/home', [HomeAdminController::class, 'index'])->name('home');
    Route::get('/template-table', [HomeAdminController::class, 'table'])->name('template-table');
});