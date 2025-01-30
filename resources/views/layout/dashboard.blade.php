<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{asset('font/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    @vite('resources/css/app.css')
    @vite('resources/css/navbar-styles.css')
    @stack('styles')
    @stack('scripts')
    <script type="text/javascript" src="{{asset('js/sidebar.js')}}" defer></script>
</head>
<body class="flex h-screen gap-3"> {{-- bg-secondary-bg --}}
    @if(Route::is('dashboard.admin'))
        <x-dashboard.admin_sidebar :logo="$logo" />
    @elseif(Route::is('dashboard.doctor'))
        <x-dashboard.doctor_sidebar :logo="$logo" />
    @elseif(Route::is('dashboard.patient'))
        <x-dashboard.patient_sidebar :logo="$logo" />   
    @endif
    
    <main class="w-full h-auto flex flex-col items-center gap-5 p-2 pt-0 lg:p-0 mb-3">
        <header class="container flex w-full justify-end pt-4"> <!-- I have removed the container class -->
            <nav class="">
                @if(Auth::check())
                  <x-profile_info />
                @endif
            </nav>  
        </header>
        
        <x-message_toast />
        
        <section class="container flex flex-col gap-5">
            @yield('content')
        </section>

    </main>

    <script src="{{asset('js/jquery.min.js')}}"></script>
</body>
</html>

