<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Styles / Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        @session('message')
        <div class="max-w-2xl mx-auto mt-6 p-4 bg-green-100 border border-green-200 text-green-800 rounded-lg">
          {{ session('message') }}
        </div>
        @endsession

        {{ $slot }}
    </body>
</html>
