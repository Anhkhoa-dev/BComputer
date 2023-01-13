<?php

use App\Http\Controllers\Admin\AcountConroller;
use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\Guest\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Guest\CartConntroller;
use App\Http\Controllers\Guest\GuestController;

//thường dân dân
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
    //   Route::get('/products/{slug}', [IndexController::class, 'getProducts'])->name('/products');
    Route::get('/products/details', [GuestController::class, 'getDetail'])->name('/produts/detail');
    //    Route::get('/products/details1', [GuestController::class, 'getDetail1'])->name('/produts/detail1');



    // phần dành cho user
    Route::group(
        ['middleware' => 'ckUserLogin'],
        function () {
            // hành động check thanh toán, thêm giỏ hàng, thêm sản phẩm yêu thích, comment

            // Xem giỏ hàng
            Route::get('/cart-items', [CartConntroller::class, 'getViewcart'])->name('user/cart-items');
            Route::get('/checkout-process', [CartConntroller::class, 'getCheckoutProcess'])->name('checkout/checkout-process');

            Route::get('/checkout-success', [CartConntroller::class, 'getSuccess'])->name('user/checkout-success');

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
    Route::get('admin/acount', [AcountConroller::class, 'index'])->name('admin/acount');

    // Phần danh cho product manager - khoa
    Route::get('admin/product', [ProductController::class, 'index'])->name('admin/product');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin/product/create');

    // Phần danh cho supplier - Khoa
    Route::get('admin/supplier', [SupplierController::class, 'index'])->name('admin/supplier');
    Route::get('admin/supplier/create', [SupplierController::class, 'create'])->name('supplier/create');
    Route::get('admin/supplier/edit/{slug}', [SupplierController::class, 'edit'])->name('supplier/edit');
    // Route::post('admin/supplier/delete', [SupplierController::class, 'delete'])->name('deleteSupplierItem');
});
