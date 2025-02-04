<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class,'index'])->name('home.index');

//User account creation and auth routes
require base_path('/routes/auth/user.php');

// Grouped Dashboard Routes
require base_path('/routes/dashboard/index.php');

// Doctor Page handling routes
require base_path('/routes/home/doctor.php');

// Specialty Page handling routes
require base_path('/routes/home/specialty.php');
