<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WidgetController;

Route::get('home',[WidgetController::class,'getData']);
Route::get("table",[UserController::class,'getData']);
Route::post("table",[UserController::class,'postData']);
Route::get('/delete/{id}',[UserController::class,'delData']);
Route::get('/replicate/{id}', [UserController::class,'copyData']);
Route::get("update/{id}",[UserController::class,'showData']);
Route::post("update",[UserController::class,'updateData']);
Route::get('/login', function () {
    return view('shop.login');
});


