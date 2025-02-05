<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\DoctorController;

    Route::controller(DoctorController::class)
    ->group(function (){
        Route::get('/doctors', 'index')->name('home.doctors');
        
        Route::name('doctor.')
        ->prefix('doctor')
        ->group(function () {
            Route::get('/register', 'create')->name('register');
            Route::post('/register', 'store')->name('create');
            Route::get('/{doctor}/profile', 'show')->name('show');

            // Doctor Search Routes
            // Doctor search routes based on specialty
            Route::get('/specialty/{specialty}','get_by_specialty')->name('get_by_specialty');
            
            // Doctor search routes based on doctor name
            Route::post('/search','get_by_name')->name('get_by_name');
            
            // Add a middleware to check the value of the specialty
            Route::middleware('check_specialty')->post('/specialty', 'get_specialty')->name('get_specialty');
        });
    });
        
?>