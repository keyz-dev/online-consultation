<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class,'index'])->name('home.index');

Route::controller(UserController::class)
->name('user.')
->prefix('user')
->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::get('/register','create')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/register','store')->name('create');
    Route::post('/logout',  'logout')->name('logout');
});

Route::controller(DashboardController::class)
->name('dashboard.')
->prefix('dashboard')
->group(function () {
    Route::get('admin','admin')->name('admin');
    Route::get('doctor','doctor')->name('doctor');
    Route::get('patient','patient')->name('patient');
});