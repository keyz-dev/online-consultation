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

        // Sidebar routes
        Route::controller(DoctorDashboardController::class)
        ->group(function() {
            Route::get('/', 'index');
            Route::get('/availability', 'availabilityPage')->name('.availability');
            Route::get('/profile', 'profile')->name('.profile');
            Route::get('/appointments', 'appointments')->name('.appointments');
            Route::get('/chats', 'chats')->name('.chats');
            Route::get('/calls', 'calls')->name('.calls');
        });

        // Require specific account traits
        require base_path('/routes/dashboard/doctor/profile.php');
    });
?>
