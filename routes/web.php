<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\AddressController;
use App\Http\Controllers\common\MediaController;

// Route::get('home',[WidgetController::class,'getData']);
// Route::get("table",[UserController::class,'getData']);
// Route::post("table",[UserController::class,'postData']);
// Route::get('/delete/{id}',[UserController::class,'delData']);
// Route::get('/replicate/{id}', [UserController::class,'copyData']);
// Route::get("update/{id}",[UserController::class,'showData']);
// Route::post("update",[UserController::class,'updateData']);



Route::get('/address', function () {
    return view('user.address');
});
Route::get('/media', function () {
    return view('common.media');
});
Route::get('/register', function () {
    return view('user.register');
});

Route::get('/login', function () {
    return view('user.login');
});
Route::group(['namespace' => 'user'], function () {
  
    Route::post('register', [UserController::class, 'postUser']);
    Route::post('address', [AddressController::class, 'saveAddress']);
    Route::post('media', [MediaController::class, 'uploadImage']);
   
});
Route::group(['namespace' => 'common'], function () {
    
    Route::post('media', [MediaController::class, 'uploadImage']);
   
});