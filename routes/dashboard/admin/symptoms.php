<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HealthConcernController;

    Route::controller(HealthConcernController::class)
    ->name('.symptom.')
    ->prefix('symptom')
    ->group(function () {
        Route::get('/create','create')->name('create');
        Route::post('/create','store')->name('create');
        Route::get('/{symptom}/edit','edit')->name('edit');   
        Route::get('/{symptom}/delete','destroy')->name('delete');   
        Route::patch('/{symptom}','update')->name('update');
    });
        
?>