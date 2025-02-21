<?php

use App\Http\Controllers\AvailabilityController;
use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DoctorDashboardController;

    /*
    Doctor dashboard routes
    name = dashboard
    prefix = /dashboard
    */

    Route::middleware('doctor_auth')
    ->name('.doctor')
    ->prefix('doctor')
    ->group(function () {

        // Sidebar routes
        Route::controller(DoctorDashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
            Route::get('/patients', 'patientsPage')->name('.patients');
            Route::get('/profile', 'profile')->name('.profile');
            Route::get('/appointments', 'appointments')->name('.appointments');
            Route::get('/chats', 'chats')->name('.chats');
            Route::get('/calls', 'calls')->name('.calls');
        });

        //Routes for setting availability
        Route::controller(AvailabilityController::class)
        ->name('.availability')
        ->prefix('availability')
        ->group(function(){
            Route::get('/', 'index');
            Route::get('/set', 'create')->name('.set');
            Route::get('/set/equivalent', 'equivalent')->name('.set.equivalent');
            Route::post('/set/equivalent', 'equivalent_store')->name('.set.equivalent');
        });

        // Require specific account traits
        require base_path('/routes/dashboard/doctor/profile.php');
    });
?>
    