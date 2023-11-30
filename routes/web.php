<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\client\ProductsController;
use App\Http\Controllers\client\ProductDetailsController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\CheckoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Client\CategoryClientController;
use App\Http\Controllers\client\ChatController;
use App\Http\Controllers\Client\KhachHangController;
use App\Http\Controllers\forgotPassController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliveryController;

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
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('SaveCartProduct');
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('ShowCartProduct');
Route::get('/show-gio-hang', [CartController::class, 'show_giohang'])->name('ShowGioHangProduct');
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_cart'])->name('DeleteCartProduct');
Route::post('/update-cart-quaty', [CartController::class, 'update_quaty'])->name('UpdateQuaty');
Route::post('/update-cart', [CartController::class, 'update_cart'])->name('UpdateCart');
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax'])->name('addfcartajax');
Route::get('/delete-sp/{session_id}', [CartController::class, 'delete_sp'])->name('delete-sp');
Route::get('/delete-all', [CartController::class, 'delete_all'])->name('delete-all');


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

    //don hang

    Route::get('/manage-order', [CheckoutController::class, 'manageOrder'])->name('manageOrder');
    Route::get('/view-order/{orderid}', [CheckoutController::class, 'viewOrder'])->name('viewOrder');

    //coupon
    Route::post('/check-coupon', [CouponController::class, 'check_coupon']);
    Route::get('/inrset-coupon', [CouponController::class, 'inrset_coupon'])->name('admin.insretCoupon');
    Route::get('/list-coupon', [CouponController::class, 'list_coupon'])->name('admin.listCoupon');
    Route::post('/inrset-coupon-post', [CouponController::class, 'inrset_coupon_post'])->name('admin.insretCouponPost');

    Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);

    //Delivery
    Route::get('/delivery', [DeliveryController::class, 'delivery'])->name('delivery');
    Route::post('/select-delivery', [DeliveryController::class, 'select_delivery'])->name('select-delivery');
    Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
    Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
    Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);
});
Route::get('/productDetails/{id}', [ProductDetailsController::class, 'getProductDetails'])->name('ProductDetails');
Route::resource('/Cart', CartController::class);
Route::get('/Order/Checkout', [OrderController::class, 'getOrder']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/search', [HomeController::class, 'searchController'])->name('search');

Route::get('/chat', [ChatController::class, 'getChat'])->name('chat');
Route::post('/send/chat', [ChatController::class, 'sendChat'])->name('chat.send');
Route::post('/sendAdmin/chat', [ChatController::class, 'sendChatAdmin'])->name('chat.send');
Route::post("sockets/connect", [ChatController::class, 'connect']);
Route::get('/users', 'ChatController@showUser');

Route::get('/admin/chat', [ChatController::class, 'getChatAdmin'])->name('chat');


//coupon

Route::post('/check-coupon', [CartController::class, 'checkCoupon'])->name('checkCoupon');


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

Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('LoginCheckout');
Route::get('/checkoutPay', [CheckoutController::class, 'checkoutPay'])->name('CheckoutPay');
Route::post('/save_checkout', [CheckoutController::class, 'save_checkout'])->name('save_checkout');
Route::get('/handCash', [CheckoutController::class, 'save_checkout'])->name('handCash');
Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon'])->name('deletecoupon');
Route::get('/edit-coupon/{coupon_id}', [CouponController::class, 'edit_coupon'])->name('editcoupon');
Route::post('/update-coupon/{coupon_id}', [CouponController::class, 'update_coupon'])->name('updatecoupon');
Route::post('/search-danhmuc', [CategoryController::class, 'search_danhmuc'])->name('search_danhmuc');
