<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class,'index'])->name('home.index');

Route::controller(UserController::class)
->name('user.')
->prefix('user')
->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/register','create')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/register','store')->name('register');
});