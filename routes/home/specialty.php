<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SpecialtyController;

    Route::controller(SpecialtyController::class)
    ->group(function (){
        Route::get('/specialties', 'index')->name('home.specialties');
        
        Route::name('specialty.')
        ->prefix('specialty')
        ->group(function () {
            Route::get('/{specialty}/profile', 'show')->name('show');
        });
    });      
?>