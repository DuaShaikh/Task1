<?php

use GuzzleHttp\Middleware;
use App\Http\Livewire\LoginForm;
use App\Http\Livewire\MediaForm;
use App\Http\Livewire\AddressForm;
use App\Http\Livewire\UserRegister;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Shop\OrderController;
use App\Http\Controllers\Shop\StockController;
use App\Http\Controllers\Common\MediaController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\Shop\OrderItemController;

Route::group(['namespace' => 'Shop', 'middleware' => ['auth', 'role'], 'prefix' => 'admin/dashboard'], function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('admin/dashboard');

    // ------admin_product
    Route::get('product', [ProductController::class, 'getAdminProducts'])->name('dashboard/product');
    Route::get('product/add-product', [ProductController::class, 'showAdminCategory']);
    Route::post('product/add-product', [ProductController::class, 'addAdminProducts']);
    Route::get('delete-product/{id}', [ProductController::class, 'deleteAdminProducts']);
    Route::get('product/show-product/{id}', [ProductController::class, 'showAdminProducts']);
    Route::post('product/show-product/{id}/edit-product', [ProductController::class, 'editAdminProducts']);
    Route::get('/product/add-product/stocks', function () {
        return view('admin.product-stock-register');
    });
    Route::get('/product/show-product/edit-product/stock-update', function () {
        return view('admin.product-stock-update');
    });

    Route::post('product/stocks', [StockController::class, 'addStocks']);
    Route::post('product/show-product/{id}/stock-update', [StockController::class, 'editStocks']);

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
Route::post('/registerUser', UserRegister::class);
Route::post('/address', AddressForm::class);
Route::post('/media', MediaForm::class);

// Route::get('/user-login', function () {
//     return view('user.login');
// });

// Route::post('loginUser', LoginForm::class);

Route::group(['namespace' => 'User'], function () {

    Route::get('dashboard/orders', [UserController::class, 'getUserItems'])->name('dashboard/orders');
    // Route::post('register', [UserController::class, 'postUser']);
    // Route::post('address', [AddressController::class, 'saveAddress']);
    // Route::post('media', [MediaController::class, 'uploadImage']);
});

Route::group(['namespace' => 'Common'], function () {
    Route::post('media', [MediaController::class, 'uploadImage']);
});

Route::get('/address', function () {
    return view('user.address');
});
Route::get('/media', function () {
    return view('common.media');
});

Route::group(['namespace' => 'Shop'], function () {

    Route::get('view-product/{id}', [ProductController::class, 'getProductByid']);
    Route::post('view-product/add-to-cart', [CartController::class, 'addToCart']);
    Route::get('view-cart', [CartController::class, 'viewCart'])->name('view-cart');
    Route::get('deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart/{id}');
    Route::post('checkout', [CartController::class, 'updateCart']);
    Route::post('update-detail', [OrderController::class, 'postOrder']);
    Route::post('order-item/{id}', [OrderItemController::class, 'orderItem']);
});

Route::get('/auth', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('google/callback', [LoginForm::class, 'handleGoogleCallback']);

Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('facebook/callback', [LoginForm::class, 'handleFacebookCallback']);
// Route::get('/order-detail', function () {
//     return view('shop.order-detail');
// });
