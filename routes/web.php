<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\user\UserController;

// Route::get('home',[WidgetController::class,'getData']);
// Route::get("table",[UserController::class,'getData']);
// Route::post("table",[UserController::class,'postData']);
// Route::get('/delete/{id}',[UserController::class,'delData']);
// Route::get('/replicate/{id}', [UserController::class,'copyData']);
// Route::get("update/{id}",[UserController::class,'showData']);
// Route::post("update",[UserController::class,'updateData']);



Route::get('/address', function () {
    return view('shop.address');
});
Route::get('/media', function () {
    return view('shop.media');
});
Route::get('/register', function () {
    return view('shop.register');
});

Route::get('/login', function () {
    return view('shop.login');
});
Route::group(['namespace' => 'user'], function () {
  
    Route::post('register', [UserController::class, 'postUser']);
    Route::post('address', [UserController::class, 'userAddress']);
   
});
