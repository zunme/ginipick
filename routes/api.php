<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdmUser;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/user/checkid' , [UserController::class, 'checkId']);
Route::middleware(['auth:sanctum','cache.headers:no_store'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/users', [AdmUser::class, 'list']);
    });
});