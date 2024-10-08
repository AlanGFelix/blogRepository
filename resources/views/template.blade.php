<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Web</title>
    @vite('resources/css/app.css')
</head>
<body class="p-5">
    <div class="container px-4 mx-auto">
        <header class="flex justify-between items-center py-4">
            <div class="flex items-center flex-grow gap-4">
                <a href="{{ route('home') }}">
                    <img src="{{ Vite::image('elephant.png') }}" alt="home" class="h-12">
                </a>
                <form action="{{ route('home') }}" class="flex-grow">
                    <input type="text" placeholder="Buscar..." class="w-4/6 py-2 px-4 rounded-full text-lg border-gray-400" name="search" value="{{ request('search') }}"/>
                </form>
            </div>
            @auth
                <a href="{{ route('dashboard') }}" class="px-2 py-1 bg-gray-800 text-white text-sm rounded">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="px-2 py-1 bg-gray-800 text-white text-xs rounded">LogIn</a>
            @endauth
        </header>
        <div class="opacity-60 h-px mb-8" style="
            background: linear-gradient(to right,
            rgba(200, 200, 200, 0) 0%,
            rgba(200, 200, 200, 1) 30%,
            rgba(200, 200, 200, 1) 70%,
            rgba(200, 200, 200, 0) 100%
            );
        "></div>

        @yield('content')

        <div class="container w-full py-16">
            <img src="{{ Vite::image('elephant.png') }}" alt="home" class="h- mx-auto">
        </div>
    </div>
</body>
</html>