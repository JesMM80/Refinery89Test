<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @stack('styles')
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        
        <header class="bg-white shadow p-5 border-b">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                    Refinery89
                </h1>                  
                <x-menu-component class="flex gap-2 items-center" />                                   
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center text-gray-500 p-5 font-bold mt-10">
            Refinery89 {{ now()->year }} 
        </footer>
    </body>
</html>
</html>
