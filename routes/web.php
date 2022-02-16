<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\shop\CartController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\shop\OrderController;
use App\Http\Controllers\shop\StockController;
use App\Http\Controllers\common\MediaController;
use App\Http\Controllers\shop\ProductController;
use App\Http\Controllers\user\AddressController;
use App\Http\Controllers\shop\CategoryController;
use App\Http\Controllers\shop\OrderItemController;


Route::group(['namespace' => 'shop', 'middleware' => ['auth', 'role'], 'prefix' => 'admin/dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('admin/dashboard');

    // ------admin_product
    Route::get('product', [ProductController::class, 'getAdminProducts'])->name('dashboard/product');
    Route::get('product/add-product', [ProductController::class, 'showAdminCategory']);
    Route::post('product/add-product', [ProductController::class, 'addAdminProducts']);
    Route::get('delete-product/{id}', [ProductController::class, 'deleteAdminProducts']);
    Route::get('product/show-product/{id}', [ProductController::class, 'showAdminProducts']);
    Route::post('product/show-product/edit-product', [ProductController::class, 'editAdminProducts']);
    Route::get('/product/add-product/stocks', function () {
        return view('admin.product-stock');
    });
    Route::post('product/stocks', [StockController::class, 'addStocks']);



        // ------admin_category
    Route::get('category', [CategoryController::class, 'getAdmincategories'])->name('dashboard/category');
    Route::get('category/add-category', [CategoryController::class, 'showAdminSubCategory']);
    Route::post('category/add-category', [CategoryController::class, 'addAdminCategories']);
    Route::get('delete-category/{id}', [CategoryController::class, 'deleteAdminCategories']);
    Route::get('category/show-category/{id}', [CategoryController::class, 'showAdminCategories']);
    Route::post('category/show-category/edit-category', [CategoryController::class, 'editAdminCategories']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['namespace' => 'user'], function () {
    Route::get('/', [ProductController::class,'getProduct'])->name('/');
});

require __DIR__ . '/auth.php';

Route::get('/register', function () {
    return view('user.register');
});

Route::group(['namespace' => 'user'], function () {

    Route::get('dashboard/orders', [UserController::class, 'getUserItems'])->name('dashboard/orders');
    Route::post('register', [UserController::class, 'postUser']);
    Route::post('address', [AddressController::class, 'saveAddress']);
    Route::post('media', [MediaController::class, 'uploadImage']);
});

Route::group(['namespace' => 'common'], function () {
    Route::post('media', [MediaController::class, 'uploadImage']);
});

// Route::get('/address', function () {
//     return view('user.address');
// });
// Route::get('/media', function () {
//     return view('common.media');
// });


Route::group(['namespace' => 'shop'], function () {

    Route::get('view-product/{id}', [ProductController::class, 'getProductByid']);
    Route::post('view-product/add-to-cart', [CartController::class, 'addToCart']);
    Route::get('view-cart', [CartController::class, 'viewCart'])->name('view-cart');
    Route::get('deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart/{id}');
    Route::post('checkout', [CartController::class, 'updateCart']);
    Route::post('update-detail', [OrderController::class, 'postOrder']);
    Route::post('order-item/{id}', [OrderItemController::class, 'orderItem']);
});


// Route::get('/order-detail', function () {
//     return view('shop.order-detail');
// });
