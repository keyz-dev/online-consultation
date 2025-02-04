<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index'])->name('home.index');

//User account creation and auth routes
require __DIR__.'/auth/user.php';


// Grouped Dashboard Routes
require __DIR__.'/dashboard/index.php';


// Doctor Page handling routes
require __DIR__.'/home/doctor.php';

// Specialty Page handling routes
require __DIR__.'/home/specialty.php';
