<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;

    // User Creation and authentication handling

    Route::controller(UserController::class)
    ->name('user.')
    ->prefix('user')
    ->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::get('/register','create')->name('register');
        Route::post('/login', 'login')->name('login');
        Route::post('/register','store')->name('create');
        Route::post('/logout',  'logout')->name('logout');
    });
?>
