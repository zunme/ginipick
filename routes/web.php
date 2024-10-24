<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/phoneVerification', [UserController::class, 'hpcert']);
Route::match(array('GET', 'POST'),'/checkplus/{result}', [UserController::class, 'checkPlusResult']);
Route::get('/getHpVerified', [UserController::class, 'getHpVerified']);

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
Route::get('/pages/{pagename}', function ($pagename) {
    $bladename = 'front.pages.'.$pagename;
    if(\View::exists($bladename)) return view($bladename);
    else return redirect('/');
});
require __DIR__.'/auth.php';
