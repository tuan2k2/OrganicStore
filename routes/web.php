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
use App\Http\Controllers\Client\CategoryClientController;
use App\Http\Controllers\Client\KhachHangController;
use App\Http\Controllers\forgotPassController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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


// login
Route::get('/login', [LoginController::class, 'getLogin'])->name('login');
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/register', [KhachHangController::class, 'register'])->name('register');
Route::get('/login-facebook', [LoginController::class, 'login_facebook'])->name('login-facebook');
Route::get('/login/callback', [LoginController::class, 'callback_facebook']);
Route::get('/login-google', [LoginController::class, 'login_google'])->name('login-google');
Route::get('/google/callback', [LoginController::class, 'callback_google']);

// forgotPass

Route::get('/forgot', [forgotPassController::class, 'getforgot'])->name('forgotPass');
Route::post('/forgot', [forgotPassController::class, 'postgetforgot'])->name('forgot');
Route::get('/getPass/{token}', [forgotPassController::class, 'getPass'])->name('getPass');
Route::post('/getPass/{token}', [forgotPassController::class, 'postGetPass'])->name('postGetPass');


//product
Route::get('/products', [ProductsController::class, 'getAllProducts'])->name('Products');
Route::get('/productDetails/{id}', [ProductDetailsController::class, 'getProductDetails'])->name('ProductDetails');
Route::resource('/Cart', CartController::class);
Route::get('/Order/Checkout', [OrderController::class, 'getOrder']);
//admin
Route::prefix('admin')->middleware(['checkAdminLogin'])->group(function () {
    Route::get('/', [HomeAdminController::class, 'show_dashboard'])->name('admin.dashboard');
    Route::get('/addDanhMuc', [CategoryController::class, 'addDanhMucSanPham'])->name('addDanhMuc');
    Route::get('/editDanhMuc/{maDanhMuc}', [CategoryController::class, 'editDanhMucSanPham'])->name('editDanhMuc');
    Route::get('/deleteDanhMuc/{maDanhMuc}', [CategoryController::class, 'deleteDanhMucSanPham'])->name('deleteDanhMuc');
    Route::post('/saveDanhMuc', [CategoryController::class, 'saveDanhMucSanPham'])->name('saveDanhMuc');
    Route::post('/updateDanhMuc/{maDanhMuc}', [CategoryController::class, 'updateDanhMucSanPham'])->name('updateDanhMuc');
    Route::get('/allDanhMuc', [CategoryController::class, 'allDanhMucSanPham'])->name('allDanhMuc');
    Route::get('/unactive_category/{maDanhMuc}', [CategoryController::class, 'unactive_category'])->name('unactive_category');
    Route::get('/active_category/{maDanhMuc}', [CategoryController::class, 'active_category'])->name('active_category');


    //SanPham
    Route::get('/addSanPham', [ProductController::class, 'addSanPham'])->name('addSanPham');
    Route::get('/editSanPham/{maSanPham}', [ProductController::class, 'editSanPham'])->name('editSanPham');
    Route::get('/deleteSanPham/{maSanPham}', [ProductController::class, 'deleteSanPham'])->name('deleteSanPham');
    Route::post('/saveSanPham', [ProductController::class, 'saveSanPham'])->name('saveSanPham');
    Route::post('/updateSanPham/{maSanPham}', [ProductController::class, 'updateSanPham'])->name('updateSanPham');
    Route::get('/allSanPham', [ProductController::class, 'allSanPham'])->name('allSanPham');
    Route::get('/unactive_product/{maSanPham}', [ProductController::class, 'unactive_product'])->name('unactive_product');
    Route::get('/active_product/{maSanPham}', [ProductController::class, 'active_product'])->name('active_product');
});
Route::get('/productDetails/{id}', [ProductDetailsController::class, 'getProductDetails'])->name('ProductDetails');
Route::resource('/Cart', CartController::class);
Route::get('/Order/Checkout', [OrderController::class, 'getOrder']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'searchController'])->name('search');

//DanhMucSanPham_TrangChu
Route::get('/danh-muc-san-pham/{maDanhMuc}', [CategoryController::class, 'show_category_home'])->name('showproduct');
Route::get('/chi-tiet-san-pham/{maSanPham}', [ProductController::class, 'details_product'])->name('chitietproduct');
//DanhMucSanPham_KhachHang
Route::get('/products', [CategoryClientController::class, 'getAllProducts'])->name('Products');

//DanhMucSanPham_Admin
Route::get('/addDanhMuc', [CategoryController::class, 'addDanhMucSanPham'])->name('addDanhMuc');
Route::get('/editDanhMuc/{maDanhMuc}', [CategoryController::class, 'editDanhMucSanPham'])->name('editDanhMuc');
Route::get('/deleteDanhMuc/{maDanhMuc}', [CategoryController::class, 'deleteDanhMucSanPham'])->name('deleteDanhMuc');
Route::post('/saveDanhMuc', [CategoryController::class, 'saveDanhMucSanPham'])->name('saveDanhMuc');
Route::post('/updateDanhMuc/{maDanhMuc}', [CategoryController::class, 'updateDanhMucSanPham'])->name('updateDanhMuc');
Route::get('/allDanhMuc', [CategoryController::class, 'allDanhMucSanPham'])->name('allDanhMuc');
Route::get('/unactive_category/{maDanhMuc}', [CategoryController::class, 'unactive_category'])->name('unactive_category');
Route::get('/active_category/{maDanhMuc}', [CategoryController::class, 'active_category'])->name('active_category');

//SanPham
Route::get('/addSanPham', [ProductController::class, 'addSanPham'])->name('addSanPham');
Route::get('/editSanPham/{maSanPham}', [ProductController::class, 'editSanPham'])->name('editSanPham');
Route::get('/deleteSanPham/{maSanPham}', [ProductController::class, 'deleteSanPham'])->name('deleteSanPham');
Route::post('/saveSanPham', [ProductController::class, 'saveSanPham'])->name('saveSanPham');
Route::post('/updateSanPham/{maSanPham}', [ProductController::class, 'updateSanPham'])->name('updateSanPham');
Route::get('/allSanPham', [ProductController::class, 'allSanPham'])->name('allSanPham');
Route::get('/unactive_product/{maSanPham}', [ProductController::class, 'unactive_product'])->name('unactive_product');
Route::get('/active_product/{maSanPham}', [ProductController::class, 'active_product'])->name('active_product');
