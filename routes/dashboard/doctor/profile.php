<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DoctorController;

    /*
    Doctor dashboard routes
    name = dashboard.doctor
    prefix = /dashboard/doctor
    */

    // Doctor account management routes
    Route::controller(DoctorController::class)
    ->group(function() {
        Route::get('/profile/{doctor}/edit', 'edit')->name('.profile.edit');
        Route::patch('/profile/{doctor}/update', 'update')->name('.profile.update');
        Route::get('/profile/{doctor}/delete', 'destroy')->name('.profile.delete');
    });
?>
