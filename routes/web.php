<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->prefix('user')->name('user.login');
Route::get('/register', [AuthController::class, 'register'])->prefix('user')->name('user.name');

Route::post('/register', [AuthController::class, 'registerpost'])->prefix('user')->name('user.register.post');

Route::post('/login', [AuthController::class, 'loginpost'])->prefix('user')->name('user.login.post');
Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::get('/login', function(){
        return view('admin.login');
    });
});
Route::get('/logout', function(){
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    dd('done');
});
Route::get('/check', function(){
    dd(auth()->check());
});
Route::middleware('admin')->group(
    function () {
        Route::get('/admin/dashboard', function () {
            return "Hello Admin";
        });
    }
);