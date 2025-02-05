<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AdminDashboardController;

    Route::controller(AdminDashboardController::class)
    ->group(function() {
        Route::get('/', 'index');
        Route::get('/specialties', 'specialties')->name('.specialties');
        Route::get('/doctors', 'doctors')->name('.doctors');
        Route::get('/patients', 'patients')->name('.patients');
        Route::get('/symptoms', 'symptoms')->name('.symptoms');
        Route::get('/appointments', 'appointments')->name('.appointments');
        Route::get('/consultations', 'consultations')->name('.consultations');
        Route::get('/notifications', 'notifications')->name('.notifications');
        Route::get('/q_and_as', 'q_and_as')->name('.q_and_as');
        Route::get('/chats', 'chats')->name('.chats');
        Route::get('/calls', 'calls')->name('.calls');
        Route::get('/profile', 'profile')->name('.profile');
        Route::get('/testimonials', 'testimonials')->name('.testimonials');
    });
?>