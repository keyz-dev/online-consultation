<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HealthConcernController;
use App\Http\Controllers\QAndAController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\PatientDashboardController;

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
    Route::middleware('admin_auth')
    ->name('.admin')
    ->prefix('admin')
    ->group(function () {

        Route::controller(AdminDashboardController::class)
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
            Route::get('/profile', 'profile')->name('.profile');
            Route::get('/testimonials', 'testimonials')->name('.testimonials');
        });
          
        // Admin specialties routes
        Route::controller(SpecialtyController::class)
        ->name('.specialty.')
        ->prefix('specialty')
        ->group(function () {
            Route::get('/create','create')->name('create');
            Route::post('/create','store')->name('create');
            Route::get('/{specialty}/edit','edit')->name('edit');   
            Route::get('/{specialty}/delete','destroy')->name('delete');   
            Route::patch('/{specialty}','update')->name('update');
        });
        
        // Admin symptoms routes
        Route::controller(HealthConcernController::class)
        ->name('.symptom.')
        ->prefix('symptom')
        ->group(function () {
            Route::get('/create','create')->name('create');
            Route::post('/create','store')->name('create');
            Route::get('/{symptom}/edit','edit')->name('edit');   
            Route::get('/{symptom}/delete','destroy')->name('delete');   
            Route::patch('/{symptom}','update')->name('update');
        });
        
        // Admin q_and_a routes
        Route::controller(QAndAController::class)
        ->name('.q_and_a.')
        ->prefix('q_and_a')
        ->group(function () {
            Route::get('/create','create')->name('create');
            Route::post('/create','store')->name('create');
            Route::get('/{q_and_a}/edit','edit')->name('edit');   
            Route::get('/{q_and_a}/delete','destroy')->name('delete');   
            Route::patch('/{q_and_a}','update')->name('update');
        });
        
    });

    // Doctor Dashboard routes
    Route::middleware('doctor_auth')
    ->name('.doctor')
    ->prefix('doctor')
    ->group(function () {
        Route::controller(DoctorDashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
        });
    });

    // Patient Dashboard routes
    Route::middleware('patient_auth')
    ->name('.patient')
    ->prefix('patient')
    ->group(function () {

        Route::controller(PatientDashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
        });
    });
});

// Doctor Page handling routes
Route::controller(DoctorController::class)
->group(function (){
    Route::get('/doctors', 'index')->name('home.doctors');
    
    Route::name('doctor.')
    ->prefix('doctor')
    ->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store')->name('create');
        Route::get('/{doctor}/profile', 'show')->name('show');
    });
});