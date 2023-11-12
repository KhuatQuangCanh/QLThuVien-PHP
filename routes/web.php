<?php

use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\QLyGiaoDichController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\NguoidungController;
use App\Http\Controllers\Admin\NhanvienController;
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
    Route::get('/tim-sach', [HomeClientController::class, 'timSach'])->name('tim-sach');

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
        Route::get('/chitiet-sach/{ten}', [BookController::class, 'getChitietSach'])->name('chi-tiet-1');
        Route::get('/chitiet-sachs/{ten}/{tap}', [BookController::class, 'getChitietSach'])->name('chi-tiet-2');
        Route::get('/tim-sach/{id}', [BookController::class, 'getBookById'])->name('getBookById');
        Route::get('/tim-sach/the-loai/{idTL}', [BookController::class, 'getBooksByGenreForHome'])->name('getBooksByGenre');
        Route::get('/tu-sach/tim-sach/the-loai/{idTL}', [BookController::class, 'getBooksByGenreForBookCase'])->name('getBooksByGenreForBookCase');

        Route::post('/add-to-cart', [CartController::class,'addToCart'])->name('addtocart');
        
        Route::get('/delete-from-cart-1/{idSach}/{tenSach}/{idTap}/{tenTap}',[CartController::class,'deleteFromCart'])->name('delete-from-cart-1');
        Route::get('/delete-from-cart-2/{idSach}/{tenSach}',[CartController::class,'deleteFromCart'])->name('delete-from-cart-2');

        Route::post('/xac-nhan-dat',[CartController::class,'xacNhanDat'])->name('xac-nhan-dat');
    });
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('home');
    Route::get('/home', [HomeAdminController::class, 'index'])->name('home');
    Route::get('/template-table', [HomeAdminController::class, 'table'])->name('template-table');
    Route::prefix('/danhmucsach')->name('danhmucsach.')->group(function(){
        Route::get('',[AdminBookController::class,'index'])->name('index');

        Route::get('/nhap-sach',[AdminBookController::class,'getFormNhapSach'])->name('nhap-sach');
        Route::post('/nhap-sach',[AdminBookController::class,'postFormNhapSach'])->name('post-nhap-sach');

        Route::get('/edit-sach/{id}',[AdminBookController::class,'getEditSach'])->name('get-edit-sach');
        Route::post('/edit-sach/{id}',[AdminBookController::class,'postEditSach'])->name('post-edit-sach');

        Route::get('/xoa-sach/{id}',[AdminBookController::class,'postDeleteBook'])->name('post-xoa-sach');
    
        Route::get('/nhap-sach-tap/{idSach}',[AdminBookController::class,'getFormNhapSachTap'])->name('get-form-nhap-tap');
        Route::post('/nhap-sach-tap/{idSach}',[AdminBookController::class,'postFormNhapSachTap'])->name('post-form-nhap-tap');
    
    });

    Route::prefix('/nguoidung')->name('nguoidung.')->group(function(){
        Route::get('',[NguoidungController::class,'index'])->name('index');
    });
    Route::prefix('/nhanvien')->name('nhanvien.')->group(function(){
        Route::get('',[NhanVienController::class,'index'])->name('index');
        Route::get('/them_nv',[NhanvienController::class,'getThemNhanVien'])->name('them_nv');
        Route::post('/them_nv',[NhanvienController::class,'postThemNhanVien'])->name('post-them_nv');

        Route::get('/edit_taikhoan/{id}',[NhanvienController::class,'getEditNhanVien'])->name('get-edit-nv');
        Route::post('/edit_taikhoan/{id}',[NhanvienController::class,'postEditNhanVien'])->name('post-edit-nv');

        Route::get('/xoa-nv/{id}',[NhanVienController::class,'postDeleteNhanVien'])->name('post-xoa-nv');
    });

    Route::prefix('/order')->name('order.')->group(function(){
        Route::get('',[QLyGiaoDichController::class,'getViewOrder'])->name('get-view-order');
        Route::post('delete-order/{orderId}', [QLyGiaoDichController::class, 'deleteOrder'])->name('delete.order');
        Route::post('/{orderId}', [QLyGiaoDichController::class, 'updateStatus'])->name('update-status');
    });
    Route:: get('/borrow', [QLyGiaoDichController::class,'getViewBorrow'])-> name('get-view-borrow');
    Route:: get('/history', [QLyGiaoDichController::class, 'getViewHistory'])-> name('get-view-history');

    Route::get('orderDetal/{orderId}',[QLyGiaoDichController::class, 'getViewOrderDetal'])->name('get-View-OrderDetal');
});
