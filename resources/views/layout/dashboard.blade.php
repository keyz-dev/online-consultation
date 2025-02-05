<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{asset('font/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('font/euclid/style.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/css/navbar-styles.css')
    @stack('styles')
    @stack('scripts')
   
</head>
<body class=" flex flex-col h-screen gap-3 bg-secondary-bg">
   <x-dashboard.header />

    <section class="flex gap-4">
        @if(Route::is('dashboard.admin*'))
            <x-dashboard.admin_sidebar :logo="$logo" />
        @elseif(Route::is('dashboard.doctor*'))
            <x-dashboard.doctor_sidebar :logo="$logo" />
        @elseif(Route::is('doctor.availabily*'))
            <x-dashboard.doctor_sidebar :logo="$logo" />
        @elseif(Route::is('dashboard.patient*'))
            <x-dashboard.patient_sidebar :logo="$logo" />   
        @endif
        
        <main class="w-full flex flex-col items-center mb-3 px-2 h-auto">
            <x-message_toast />
            <section class="w-full flex flex-col">
                @yield('content')
            </section>
        </main>
    </section>

    <script type="text/javascript" src="{{asset('js/sidebar.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
</body>
</html>

