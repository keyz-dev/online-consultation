<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\QAndAController;

    Route::controller(QAndAController::class)
    ->name('.q_and_a.')
    ->prefix('q_and_a')
    ->group(function () {
        Route::get('/create','create')->name('create');
        Route::post('/create','store')->name('create');
        Route::get('/{q_and_a}/edit','edit')->name('edit');   
        Route::get('/{q_and_a}/delete','destroy')->name('delete');   
        Route::patch('/{q_and_a}','update')->name('update');
    });      
?>