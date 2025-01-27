<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthConcernController;
use App\Http\Controllers\QAndAController;
use App\Http\Controllers\SpecialtyController;

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

Route::name('dashboard')
->prefix('dashboard')
->group(function () {
    
    // Managing admin routes in the group
    Route::name('.admin')
    ->prefix('admin')
    ->group(function () {

        Route::controller(DashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
            Route::get('/specialties', 'specialties')->name('.specialties');
            Route::get('/doctors', 'doctors')->name('.doctors');
            Route::get('/patients', 'patients')->name('.patients');
            Route::get('/symptoms', 'symptoms')->name('.symptoms');
            Route::get('/appointments', 'appointments')->name('.appointments');
            Route::get('/consultations', 'consultations')->name('.consultations');
            Route::get('/notifications', 'notifications')->name('.notifications');
            Route::get('/q_and_as', 'q_and_as')->name('.q_and_as');
            Route::get('/chats', 'chats')->name('.chats');
            Route::get('/calls', 'calls')->name('.calls');
        });
          
        // Admin specialties routes
        Route::controller(SpecialtyController::class)
        ->name('.specialty.')
        ->prefix('specialty')
        ->group(function () {
            Route::get('/create','create')->name('create');
            Route::get('/{specialty}/edit','edit')->name('edit');
        });
        
        // Admin symptoms routes
        Route::controller(HealthConcernController::class)
        ->name('.symptom.')
        ->prefix('symptom')
        ->group(function () {
            Route::get('/create','create')->name('create');
            Route::get('/{symptom}/edit','edit')->name('edit');
        });
        
        // Admin q_and_a routes
        Route::controller(QAndAController::class)
        ->name('.q_and_a.')
        ->prefix('q_and_a')
        ->group(function () {
            Route::get('/create','create')->name('create');
            Route::get('/{q_and_a}/edit','edit')->name('edit');
        });
        
    });
});