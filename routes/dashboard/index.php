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
            require __DIR__.'/admin/index.php';
            
            // Admin specialties routes
            require __DIR__.'/admin/specialty.php';
            
            // Admin symptoms routes
            require __DIR__.'/admin/symptoms.php';
            
            // Admin q_and_a routes
            require __DIR__.'/admin/q_and_a.php';
        });
        
        // Doctor Dashboard routes
        require __DIR__.'/doctor/index.php';
        
        // Patient Dashboard routes
        require __DIR__.'/patient/index.php';
    });
?>