<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\MessageController;

Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::get('/user/me', [UserController::class,'me'])->name('user.me');
    Route::get('/users', [UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
    Route::get('/messages/{user}', [MessageController::class,'listMessages'])->name('message.listMessages');
    Route::post('/messages/store', [MessageController::class,'store'])->name('message.store');
});
