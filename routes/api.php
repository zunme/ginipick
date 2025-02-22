<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserController as AdmUser;
use App\Http\Controllers\Admin\QnaController as AdmQna;

use App\Http\Controllers\ContactController;

use App\Models\Qna;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/contact', [ContactController::class, 'store']);

Route::get('/user/checkid' , [UserController::class, 'checkId']);
Route::middleware(['auth:sanctum','cache.headers:no_store'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/users', [AdmUser::class, 'list'])->middleware(['permission:view_any_user']);
        Route::get('/user/{id}', [AdmUser::class, 'show'])->middleware(['permission:view_user']);
        Route::post('/user', [AdmUser::class, 'store'])->middleware(['permission:create_user']);
        Route::put('/user/{id}', [AdmUser::class, 'update'])->middleware(['permission:update_user']);
        Route::put('/user/{id}/password', [AdmUser::class, 'updatePassword'])->middleware(['permission:update_user']);
        Route::post('/user/{id}/memo', [AdmUser::class, 'storeMemo'])->middleware(['permission:update_user']);
        Route::put('/user/{id}/role', [AdmUser::class, 'updateRole'])->middleware(['role:admin']);

        Route::get('/qna', [AdmQna::class, 'list'])->middleware(['permission:view_any_qna']);
        Route::post('/qna', [AdmQna::class, 'store'])->middleware(['permission:create_qna']);
        Route::get('/contact', [ContactController::class, 'list'])->middleware(['permission:view_any_contact']);
        Route::put('/contact/{id}/status', [ContactController::class, 'updateStatus'])->middleware(['permission:update_contact']);
    });
});