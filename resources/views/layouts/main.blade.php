<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mama Parfum') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/guest.js'])
        @livewireStyles()
        @stack('styles')
    </head>
    <body class="antialiased">
            <!-- Page Content -->

            <div class="main bg-white">
                @yield('content')
            </div>

        @livewireScripts()
        @stack('scripts')
    </body>
</html>
