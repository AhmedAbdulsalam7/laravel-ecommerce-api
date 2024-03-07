<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProductController;


Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

// this is the middleware for protect some routes from unauthenticate user...

Route::middleware(['auth:api'])->group(function () {
    Route::get('userinfo', [UserAuthController::class, 'userInfo']);
    Route::get('users', [UserAuthController::class, 'index']);
    Route::get('users/{id}', [UserAuthController::class, 'show']);
    Route::delete('users/{id}', [UserAuthController::class, 'destroy']);
    Route::put('users/{id}', [UserAuthController::class, 'update']);
    Route::post('users', [UserAuthController::class, 'store']);
    Route::resource('products', ProductController::class);
});