<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\ProductDetailsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Client\KhachHangController;
use App\Http\Controllers\Admin\CategoryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [KhachHangController::class, 'register'])->name('register');

Route::get('/products', [ProductsController::class, 'getAllProducts'])->name('Products');
Route::get('/productDetails/{id}', [ProductDetailsController::class, 'getProductDetails'])->name('ProductDetails');
Route::resource('/Cart', CartController::class);
Route::get('/Order/Checkout', [OrderController::class, 'getOrder']);
Route::group(['middleware' => ['isAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', [HomeAdminController::class, 'show_dashboard'])->name('admin.dashboard');

});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/addDanhMuc' , [CategoryController::class, 'addDanhMucSanPham'])->name('addDanhMuc') ;
Route::get('/editDanhMuc/{maDanhMuc}' , [CategoryController::class, 'editDanhMucSanPham'])->name('editDanhMuc') ;
Route::get('/deleteDanhMuc/{maDanhMuc}' , [CategoryController::class, 'deleteDanhMucSanPham'])->name('deleteDanhMuc') ;
Route::post('/saveDanhMuc' , [CategoryController::class, 'saveDanhMucSanPham'])->name('saveDanhMuc') ;
Route::post('/updateDanhMuc/{maDanhMuc}' , [CategoryController::class, 'updateDanhMucSanPham'])->name('updateDanhMuc') ;
Route::get('/allDanhMuc' , [CategoryController::class, 'allDanhMucSanPham'])->name('allDanhMuc') ;
Route::get('/unactive_category/{maDanhMuc}', [CategoryController::class, 'unactive_category'])->name('unactive_category');

Route::get('/active_category/{maDanhMuc}' , [CategoryController::class, 'active_category'])->name('active_category') ;
