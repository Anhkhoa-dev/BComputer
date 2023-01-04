<?php

use App\Http\Controllers\Admin\AcountConroller;
use App\Http\Controllers\Guest\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\LoginController;


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




    // phần dành cho user
    Route::group(['middleware' => 'ckUserLogin'], function () {
        // hành động check thanh toán, thêm giỏ hàng, thêm sản phẩm yêu thích, comment
    });        
 });



 // phần dành cho admin
Route::group(["prefix" => "", "namespace" => "admin", 'middleware' => 'AdminLogin'], function(){

    
    Route::get("/admin", [AdminsController::class, "getHome"])->name("admin/dashboard");
    Route::get('admin/acount', [ AcountConroller::class, 'index' ])->name('admin/acount');


});



    













