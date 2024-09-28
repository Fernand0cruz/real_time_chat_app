<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\MessageController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['middleware'=> ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class,'index'])->name('users.index');
});
Route::get('/messages/{user}', [MessageController::class,'listMessages'])->name('message.listMessages');
