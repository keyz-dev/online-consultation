<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AppointmentController;

    Route::controller(AppointmentController::class)
    ->name('book_appointment')
    ->prefix('book_appointment')
    ->group(function (){
        Route::get('/', 'index');
        Route::get('/create/{doctor}', 'create')->name('.book');
        Route::post('/create/{doctor}/', 'store')->name('.store');
    });
?>
