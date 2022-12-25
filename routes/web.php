<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Guest\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminsController;


Route::get('login', [
    GuestController::class, 'logIn'
])->name('user/login');



// Chuyển  trang tới đăng nhập
Route::group(["prefix" => "", "namespace" => "user"], function(){
    Route::get('/', [
        IndexController::class, 'getHome'  
    ])->name('user/index');
    // Route::get('login', [
    //     GuestController::class, 'logIn',
    // ])->name('user/login');
});









Route::group(["prefix" => "", "namespace" => "admin"], function(){
    Route::get("/admin", [AdminsController::class, "getHome"])->name("admin/dashboard");

    // gọi trang quan lý products trong admin   
    Route::get('product', [
        ProductController::class,
        'index'
    ])->name('admin/product');

    // 

});




