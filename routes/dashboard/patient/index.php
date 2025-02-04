<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\PatientDashboardController;

    /*
    Doctor dashboard routes
    name = dashboard
    prefix = /dashboard
    */

    Route::middleware('patient_auth')
    ->name('.patient')
    ->prefix('patient')
    ->group(function () {
        Route::controller(PatientDashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
        });
    });
?>