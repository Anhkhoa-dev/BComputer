<?php
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AcountConroller;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserAddressController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductimageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Guest\CartConntroller;
use App\Http\Controllers\Guest\IndexController;
use App\Http\Controllers\Guest\AccountController;
use App\Models\Order;
use App\Models\ProductImage;

//Login and register
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'getLogin')->name('user/login');
    Route::post('process', 'postLogin')->name('postLogin');
    Route::get('logout', 'logout')->name('logout');
    Route::get('recovery-account', 'RecoveryAcount')->name('recovey-account');
    Route::get('register', 'getRegister')->name('user/dang-ky');
    Route::post('postRegister', 'dangky')->name('user/postDangky');
    Route::get('active-account/{user}/{token}', 'actived')->name('user/active-account');
    Route::get('send-mail', 'getSenMail');
});


// Chuyển  trang tới đăng nhập
Route::group(["prefix" => "", "namespace" => "user", 'middleware' => 'IsAdmin'], function () {
    //phần dành cho guest
    Route::get('/', [IndexController::class, 'getHome'])->name('user/index');
    Route::get('collections/{name}', [IndexController::class, 'getProducts'])->name('user/products');
    Route::get('product/{name}', [IndexController::class, 'getDetail'])->name('user/detail');
    // Route::get('tracuu', [IndexController::class, 'getTraCuu'])->name('user/tracuu');
    Route::get('search', [IndexController::class, 'getSearch']);
    Route::get('aboutus', [IndexController::class, 'aboutus'])->name('user/aboutus');
    Route::get('contact', [IndexController::class, 'contact'])->name('user/contact');
    Route::get('deliverypolicy', [IndexController::class, 'deliverypolicy'])->name('user/deliverypolicy');
    Route::get('paymentpolicy', [IndexController::class, 'paymentpolicy'])->name('user/paymentpolicy');
    Route::get('warrantypolicy', [IndexController::class, 'warrantypolicy'])->name('user/warrantypolicy');
    Route::get('ajax-tracuu-product', [IndexController::class, 'ajaxTraCuu'])->name('ajax-tracuu-info');
    Route::get('ajax-tracuu-product-list', [IndexController::class, 'ajaxTraCuuList'])->name('ajax-tracuu-info-list');

    // phần dành cho user
    Route::group(
        ['middleware' => 'ckUserLogin'],
        function () {
            // hành động check thanh toán, thêm giỏ hàng, thêm sản phẩm yêu thích, comment

            // Xem giỏ hàng
            Route::get('/cart-items', [CartConntroller::class, 'getViewcart'])->name('user/cart-items');
            Route::get('/checkout-process', [CartConntroller::class, 'getCheckoutProcess'])->name('checkout/checkout-process');
            Route::post('/ajax-checkout-process', [CartConntroller::class, 'ajaxGetCheckOutProcess']);
            Route::get('/checkout-success', [CartConntroller::class, 'getSuccess'])->name('user/checkout-success');
            Route::post('/addCart', [IndexController::class, 'addCart'])->name('user/addCart');

            //Thêm sản phẩm vào giỏ hàng
            Route::post('add-to-cart', [CartConntroller::class, 'addToCart']);
            Route::post('ajax-update-cart', [CartConntroller::class, 'ajaxUpdateCart']);
            Route::post('ajax-get-provisional-order', [CartConntroller::class, 'AjaxGetProvisionalOrder']);
            Route::post('ajax-delete-cart', [CartConntroller::class, 'AjaxDeleteCart']);
            Route::post('ajax-delete-all-select-cart', [CartConntroller::class, 'AjaxDeleteSelectCart']);
            Route::post('ajax-apply-voucher', [CartConntroller::class, 'ajaxVoucher']);
            Route::post('ajax-make-payment-process', [CartConntroller::class, 'ajaxPayment']);

            // Phần Route get, post xử lý account user
            Route::get('/account', [AccountController::class, 'getAccount'])->name('user/taikhoan');
            Route::get('account/address', [AccountController::class, 'getAddress'])->name('user/address');
            Route::post('account/postAddress', [AccountController::class, 'postAddress'])->name('user/add-address');
            Route::post('ajax-change-fullname-user', [AccountController::class, 'ajaxChangeName']);
            Route::post('ajax-change-pass-user', [AccountController::class, 'ajaxChangePass']);
            Route::post('ajax-change-image-user', [AccountController::class, 'ajaxChangeImage']);
            Route::get('account/set-default/{slug}', [AccountController::class, 'setDefaultAddress'])->name('setDefaultAddress');
            Route::get('account/my-order', [AccountController::class, 'getOrder'])->name('user/order');
        }
    );
});
// phần dành cho admin
Route::group(["prefix" => "", "namespace" => "admin", 'middleware' => 'AdminLogin'], function () {

    // Phần dashboard - Phúc
    Route::get("/admin", [AdminsController::class, "getHome"])->name("admin/dashboard");
    // Phần account - Phúc
    Route::get('admin/account', [AcountConroller::class, 'index'])->name('admin/account');
    // Create
    Route::get('admin/account/create', [AcountConroller::class, 'create'])->name('admin/account/create');
    Route::post('admin/account/store', [AcountConroller::class, 'store'])->name('admin/account/store');
    // Update
    Route::get('admin/account/edit/{id}', [AcountConroller::class, 'edit'])->name('admin/account/edit');
    Route::post('admin/account/update/{id}', [AcountConroller::class, 'update'])->name('admin/account/update');
    Route::post('admin/account/updateUser/{id}', [AcountConroller::class, 'updateUser'])->name('admin/account/updateUser');
    Route::post('admin/account/updateAccount/{id}', [AcountConroller::class, 'updateAccount'])->name('admin/account/updateAccount');
    // View
    Route::get('admin/account/view', [AcountConroller::class, 'show'])->name('admin/account/view');

    // Delete
    Route::get('admin/account/destroy/{id}', [AcountConroller::class, 'destroy'])->name('admin/account/destroy');


    // Phần Brand- Phúc
    Route::get('admin/brand', [BrandController::class, 'index'])->name('admin/brand');
    // Create
    Route::get('admin/brand/create', [BrandController::class, 'create'])->name('admin/brand/create');
    Route::post('admin/brand/store', [BrandController::class, 'store'])->name('admin/brand/store');
    // Update
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit'])->name('admin/brand/edit');
    Route::post('admin/brand/update/{id}', [BrandController::class, 'update'])->name('admin/brand/update');
    // Delete
    Route::get('admin/brand/destroy/{id}', [BrandController::class, 'destroy'])->name('admin/brand/destroy');

    // Phần ProductImage - Phúc
    Route::get('admin/proImage', [ProductimageController::class, 'index'])->name('admin/proImage');

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

    // Phần Voucher - Phúc
    Route::get('admin/voucher', [VoucherController::class, 'index'])->name('admin/voucher');
    // Create
    Route::get('admin/voucher/create', [VoucherController::class, 'create'])->name('admin/voucher/create');
    Route::post('admin/voucher/store', [VoucherController::class, 'store'])->name('admin/voucher/store');
    // Update
    Route::get('admin/voucher/edit/{id}', [VoucherController::class, 'edit'])->name('admin/voucher/edit');
    Route::post('admin/voucher/update/{id}', [VoucherController::class, 'update'])->name('admin/voucher/update');
    // Delete
    Route::get('admin/voucher/destroy/{id}', [VoucherController::class, 'destroy'])->name('admin/voucher/destroy');

    // Phần Order - Phúc
    Route::get('admin/order', [OrderController::class, 'index'])->name('admin/order');
    Route::get('admin/order/update/{id}', [OrderController::class, 'update'])->name('admin/order/update');
    Route::get('admin/order/destroy/{id}', [OrderController::class, 'destroy'])->name('admin/order/destroy');

    // Phần UserAddress - Phúc
    Route::get('admin/userAddress', [UserAddressController::class, 'index'])->name('admin/userAddress');
    Route::post('admin/userAddress/update/{id}', [UserAddressController::class, 'update'])->name('admin/userAddress/update');

    // Phần danh cho product manager - khoa
    Route::get('admin/product', [ProductController::class, 'index'])->name('admin/product');
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin/product/create');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin/product/store');
    Route::get('admin/product/show/{slug}', [ProductController::class, 'show'])->name('admin/product/show');
    Route::get('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin/product/destroy');
    //UPDATE PRODUCT - MAN
    Route::get('admin/product/edit/{slug}', [ProductController::class, 'edit'])->name('admin/product/edit');
    Route::post('admin/product/update/{id}', [ProductController::class, 'update'])->name('admin/product/update');

    // Phần danh cho supplier - Man
    Route::get('admin/supplier', [SupplierController::class, 'index'])->name('admin/supplier');
    //Create
    Route::get('admin/supplier/create', [SupplierController::class, 'create'])->name('supplier/create');
    Route::post('admin/supplier/postSupplier', [SupplierController::class, 'store'])->name('supplier/store');
    //UD
    Route::get('admin/supplier/edit/{slug}', [SupplierController::class, 'edit'])->name('supplier/edit');
    Route::post('admin/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier/update');
    //Delete
    Route::get('admin/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier/destroy');



    // Phần danh cho Catelory - Man
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin/category');
    //Create
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category/create');
    Route::post('admin/category/postSupplier', [CategoryController::class, 'store'])->name('category/store');
    //UD
    Route::get('admin/category/edit/{slug}', [CategoryController::class, 'edit'])->name('category/edit');
    Route::post('admin/category/update/{id}', [CategoryController::class, 'update'])->name('category/update');
    //Delete
    Route::get('admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category/destroy');
});