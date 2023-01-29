<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AcountConroller;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Guest\CartConntroller;
use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\Guest\AccountController;

//Login and register
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'getLogin')->name('user/login');
    Route::post('process', 'postLogin')->name('postLogin');

    Route::get('logout', 'logout')->name('logout');

    Route::get('register', 'getRegister')->name('user/dang-ky');
    Route::post('postRegister', 'dangky')->name('user/postDangky');
});


// Chuyển  trang tới đăng nhập
Route::group(["prefix" => "", "namespace" => "user", 'middleware' => 'IsAdmin'], function () {
    //phần dành cho guest
    Route::get('/', [IndexController::class, 'getHome'])->name('user/index');
    Route::get('collections/{name}', [IndexController::class, 'getProducts'])->name('user/products');
    Route::get('product/{name}', [IndexController::class, 'getDetail'])->name('user/detail');



    // phần dành cho user
    Route::group(
        ['middleware' => 'ckUserLogin'],
        function () {
            // hành động check thanh toán, thêm giỏ hàng, thêm sản phẩm yêu thích, comment

            // Xem giỏ hàng
            Route::get('/cart-items', [CartConntroller::class, 'getViewcart'])->name('user/cart-items');
            Route::get('/checkout-process', [CartConntroller::class, 'getCheckoutProcess'])->name('checkout/checkout-process');
            Route::get('/checkout-success', [CartConntroller::class, 'getSuccess'])->name('user/checkout-success');


            //Thêm sản phẩm vào giỏ hàng
            Route::post('/ajax-add-to-cart', [CartConntroller::class, 'addToCart'])->name('user/add-to-cart');
            // Phần hiển thị view tài khoản
            Route::get('/account', [AccountController::class, 'getAccount'])->name('user/taikhoan');

            // Phần Route post xử lý user thêm địa chỉ giao hàng

            Route::get('account/address', [AccountController::class, 'getAddress'])->name('user/address');
            Route::post('account/postAddress', [AccountController::class, 'postAddress'])->name('user/add-address');
            Route::get('account/set-default/{slug}', [AccountController::class, 'setDefaultAddress'])->name('setDefaultAddress');
        }
    );
});
// phần dành cho admin
Route::group(["prefix" => "", "namespace" => "admin", 'middleware' => 'AdminLogin'], function () {

    // Phần dashboard - Phúc
    Route::get("/admin", [AdminsController::class, "getHome"])->name("admin/dashboard");

    // Phần account - Phúc
    Route::get('admin/acount', [AcountConroller::class, 'index'])->name('admin/acount');
    Route::get('admin/acount/create', [AcountConroller::class, 'create'])->name('admin/acount/create');
    Route::post('admin/acount/postAcount', [AcountConroller::class, 'store'])->name('admin/acount/store');

    Route::get('admin/acount/edit/{slug}', [AcountConroller::class, 'edit'])->name('admin/acount/edit');
    Route::post('admin/acount/update', [AcountConroller::class, 'update'])->name('admin/acount/update');
    Route::get('admin/acount/view', [AcountConroller::class, 'show'])->name('admin/acount/view');

    // Phần Banner - Phúc
    Route::get('admin/banner', [BannerController::class, 'index'])->name('admin/banner');
    // Create
    Route::get('admin/banner/create', [BannerController::class, 'create'])->name('admin/banner/create');
    Route::post('admin/banner/postBanner', [BannerController::class, 'store'])->name('admin/banner/store');
    // Update
    Route::get('admin/banner/edit/{id}', [BannerController::class, 'edit'])->name('admin/banner/edit');
    Route::post('admin/banner/update/{id}', [BannerController::class, 'update'])->name('admin/banner/update');
    // Delete
    Route::get('admin/banner/destroy/{id}', [BannerController::class, 'destroy'])->name('admin/banner/destroy');



    // Phần danh cho product manager - khoa
    Route::get('admin/product', [ProductController::class, 'index'])->name('admin/product');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin/product/create');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin/product/store');
    Route::get('admin/product/show/{slug}', [ProductController::class, 'show'])->name('admin/product/show');
    Route::get('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin/product/destroy');

    // Phần danh cho supplier - Man
    Route::get('admin/supplier', [SupplierController::class, 'index'])->name('admin/supplier');
    //Create
    Route::get('admin/supplier/create', [SupplierController::class, 'create'])->name('supplier/create');
    Route::post('admin/supplier/postSupplier',[SupplierController::class, 'store'])  ->name('supplier/store');
    //Update
    Route::get('admin/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier/edit');
    Route::post('admin/supplier/update/{id}',[SupplierController::class, 'update'])  ->name('supplier/update');
    //Delete
    Route::get('admin/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier/delete');
});
