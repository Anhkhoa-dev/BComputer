<?php

use App\Http\Controllers\Admin\AcountConroller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Guest\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\LoginController;


Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('user/login');
    Route::post('process', 'postLogin')->name('postLogin');
    
    Route::get('logout', 'logout')->name('user/logout');

    Route::get('register', 'register')->name('user/dang-ky');
    //Route::post('postRegister', 'dangky')->name('user/postDangky');
});


// Chuyển  trang tới đăng nhập
Route::group(["prefix" => "", "namespace" => "user"], function(){
    Route::get('/', [
        IndexController::class, 'getHome'  
    ])->name('user/index');
});



Route::group(["prefix" => "", "namespace" => "admin"], function(){
    Route::get("/admin", [AdminsController::class, "getHome"])->name("admin/dashboard");

    // gọi trang quan lý products trong admin   
    // Route::get('product', [ProductController::class, 'index' ])->name('admin/product');

    // 
    Route::get('admin/acount', [ AcountConroller::class, 'index' ])->name('admin/acount');

});




