<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin_auth' => App\Http\Middleware\CheckAdmin::class,
            'doctor_auth' => App\Http\Middleware\CheckDoctor::class,
            'patient_auth' => App\Http\Middleware\CheckPatient::class,
            'check_specialty' => App\Http\Middleware\CheckSpecialty::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
