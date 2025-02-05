<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\SpecialtyController;

    Route::controller(SpecialtyController::class)
    ->name('.specialty.')
    ->prefix('specialty')
    ->group(function () {
        Route::get('/create','create')->name('create');
        Route::post('/create','store')->name('create');
        Route::get('/{specialty}/edit','edit')->name('edit');   
        Route::get('/{specialty}/delete','destroy')->name('delete');   
        Route::patch('/{specialty}','update')->name('update');
    });
?>