<?php
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
        Route::controller(DoctorDashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
        });
    });
?>