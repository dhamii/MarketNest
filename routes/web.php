<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->prefix('user')->name('user.login'); 
Route::get('/register', [AuthController::class, 'register'])->prefix('user')->name('user.name');

Route::post('/register', [AuthController::class, 'registerpost'])->prefix('user')->name('user.register.post');