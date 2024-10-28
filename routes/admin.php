<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //Route::get('/', function () { return view('admin.dashboard'); });
    Route::get('/', function () { return view('admin.index'); })->name('home');
    
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users')->middleware(['permission:view_any_user']);
    
    Route::get('/userv2', function () {
        return view('admin.userv2.index');
    })->name('user2')->middleware(['permission:view_any_user']);
    Route::get('/qna', function () {
        return view('admin.userv2.index');
    })->name('user2')->middleware(['permission:view_any_qna']);
    Route::get('/role', function () {
        return view('admin.users.role');
    })->name('role')->middleware(['permission:view_any_role|view_role']);
})->middleware(['permission:adminPanel'])->name('admin.');