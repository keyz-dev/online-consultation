<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AppointmentController;

    Route::controller(AppointmentController::class)
    ->name('book_appointment')
    ->prefix('book_appointment')
    ->group(function (){
        Route::get('/', 'index');


        // Route::name('doctor.')
        // ->prefix('doctor')
        // ->group(function () {
        //     Route::get('/register', 'create')->name('register');
        //     Route::post('/register', 'store')->name('create');
        //     Route::get('/{doctor}/profile', 'show')->name('show');
        // });
    });
?>
