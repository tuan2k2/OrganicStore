<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\ProductDetailsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\client\ChatController;
use App\Http\Controllers\Client\KhachHangController;

Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [KhachHangController::class, 'register'])->name('register');

Route::get('/products', [ProductsController::class, 'getAllProducts'])->name('Products');
Route::get('/productDetails/{id}', [ProductDetailsController::class, 'getProductDetails'])->name('ProductDetails');
Route::resource('/Cart', CartController::class);
Route::get('/Order/Checkout', [OrderController::class, 'getOrder']);
Route::group(['middleware' => ['isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('admin.dashboard');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/chat', [ChatController::class, 'getChat'])->name('chat');
Route::post('/send/chat', [ChatController::class, 'sendChat'])->name('chat.send');
Route::post("sockets/connect", [ChatController::class, 'connect']);
Route::get('/users', 'ChatController@showUser');
