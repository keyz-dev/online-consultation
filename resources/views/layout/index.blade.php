<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
    <title>@yield('title', 'DrogCine')</title>
    <link rel="stylesheet" href="{{asset('font/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('font/recoleta/style.css')}}">
    <link rel="stylesheet" href="{{asset('font/euclid/style.css')}}">
    <link rel="stylesheet" href="{{asset('font/sofia-pro-webfont/style.css')}}">

    @vite('resources/css/app.css')
    @vite('resources/css/navbar-styles.css')
    @stack('styles')
</head>

{{-- class="flex h-screen flex-col items-center" --}}

<body class="bg-white">   
    <x-navbar :logo="$logo"/>

    <main class="w-full h-auto flex flex-col items-center p-0">
        @yield('content')
    </main>
    
    <x-footer :logo="$logo"/>
    
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @stack('scripts')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

