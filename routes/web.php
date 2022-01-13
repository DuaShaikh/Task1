<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WidgetController;

Route::get('home',[WidgetController::class,'getData']);
Route::get("table",[UserController::class,'getData']);
Route::post("table",[UserController::class,'postData']);
Route::delete('/table/{id}', [UserController::class,'delData']);
    




