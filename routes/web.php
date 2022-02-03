<?php

use GuzzleHttp\Middleware;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\shop\CartController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\shop\OrderController;
use App\Http\Controllers\common\MediaController;
use App\Http\Controllers\shop\ProductController;
use App\Http\Controllers\user\AddressController;
use App\Http\Controllers\shop\CategoryController;
use App\Http\Controllers\shop\Order_ItemController;

// Route::get('home',[WidgetController::class,'getData']);
// Route::get("table",[UserController::class,'getData']);
// Route::post("table",[UserController::class,'postData']);
// Route::get('/delete/{id}',[UserController::class,'delData']);
// Route::get('/replicate/{id}', [UserController::class,'copyData']);
// Route::get("update/{id}",[UserController::class,'showData']);
// Route::post("update",[UserController::class,'updateData']);






Route::group(['middleware' => ['auth', 'role'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function(){
        return view ('dashboard');
    });
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['namespace' => 'user'], function () {
Route::get('/', [ProductController::class,'getProduct']);
});

require __DIR__.'/auth.php';

Route::get('/register', function () {
    return view('user.register');
});

Route::group(['namespace' => 'user'], function () {

    Route::get('dashboard/orders', [UserController::class, 'getUserItems'])->name('dashboard/orders');
    // ->middleware(['auth'])->name('dashboard');

    Route::post('register', [UserController::class, 'postUser']);
    Route::post('address', [AddressController::class, 'saveAddress']);
    Route::post('media', [MediaController::class, 'uploadImage']);
    // Route::post('update-detail', [UserController::class, 'updateDetail']);
    // Route::post('order-detail', [AddressController::class, 'updateAddress']);
    // Route::get('order-detail',[AddressController::class,'getDetail']);
   
});
Route::group(['namespace' => 'common'], function () {
    
    Route::post('media', [MediaController::class, 'uploadImage']);
    Route::post('admin/dashboard/product/add-product-media', [MediaController::class, 'postProductMedia']);
   
});

Route::get('/address', function () {
    return view('user.address');
});
Route::get('/media', function () {
    return view('common.media');
});


Route::group(['namespace' => 'shop'], function () {
    
    Route::get('view-product/{id}', [ProductController::class, 'getProductByid']);
    Route::post('view-product/add-to-cart', [CartController::class, 'addToCart']);
    Route::get('view-cart', [CartController::class, 'viewCart']);
    Route::get('deleteCart/{id}', [CartController::class, 'deleteCart']);
    Route::post('checkout', [CartController::class, 'updateCart']);
    // Route::get('checkout', [CartController::class, 'getUpdateCart']);
    // Route::get('checkout', [UserController::class, 'getUser']);
    Route::post('update-detail', [OrderController::class, 'postOrder']);
    Route::post('order-item/{id}', [Order_ItemController::class, 'order_item']);

    // ------admin_product
    Route::get('admin/dashboard/product', [ProductController::class, 'getAdminProducts'])->name('dashboard/product');
    Route::get('admin/dashboard/product/add-product', [ProductController::class, 'showAdminCategory']);
    Route::post('admin/dashboard/product/add-product', [ProductController::class, 'addAdminProducts']);
    Route::get('delete-product/{id}', [ProductController::class, 'deleteAdminProducts']);
    Route::get('admin/dashboard/product/show-product/{id}', [ProductController::class, 'showAdminProducts']);
    Route::post('admin/dashboard/product/show-product/edit-product', [ProductController::class, 'editAdminProducts']);
    Route::get('view-admin-product/{id}', [ProductController::class, 'viewAdminProducts']);

    // ------admin_category
    Route::get('admin/dashboard/category', [CategoryController::class, 'getAdmincategories'])->name('dashboard/category');
    Route::post('admin/dashboard/category/add-category', [CategoryController::class, 'addAdminCategories']);
    Route::get('delete-category/{id}', [CategoryController::class, 'deleteAdminCategories']);
    Route::get('show-category/{id}', [CategoryController::class, 'showAdminCategories']);
    Route::post('show-category/edit-category', [CategoryController::class, 'editAdminCategories']);
    
 
     
    // Route::get('/', [CartController::class, 'cartItem']);
   
});


Route::get('/order-detail', function () {
    return view('shop.order-detail');
});


Route::get('admin/dashboard/category/add-category', function() {
    return view('admin.add-category');
});

    // Route::get('dashboard/category', function() {
    //     return view('admin.category');
    // })->name('dashboard/category');
