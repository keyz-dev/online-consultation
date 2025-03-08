<?php
    use Illuminate\Support\Facades\Route;

    Route::name('dashboard')
    ->prefix('dashboard')
    ->group(function () {
        // Managing admin routes in the group
        Route::middleware('admin_auth')
        ->name('.admin')
        ->prefix('admin')
        ->group(function () {
            // admin sidebr routes
            require base_path('/routes/dashboard/admin/index.php');

            // Admin specialties routes
            require base_path('/routes/dashboard/admin/specialty.php');

            // Admin symptoms routes
            require base_path('/routes/dashboard/admin/symptoms.php');

            // Admin q_and_a routes
            require base_path('/routes/dashboard/admin/q_and_a.php');
        });

        // Doctor Dashboard routes
        require base_path('/routes/dashboard/doctor/index.php');

        // Patient Dashboard routes
        require base_path('/routes/dashboard/patient/index.php');
    });
?>
