<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @empty($title)
        <title>Game List</title>
    @else
        <title>{{ $title }} - Game List</title>
    @endempty

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto">
        <header>
            <nav>
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ route('game-list.index') }}">Game List</a>

                @can('create', \App\Models\Game::class)
                    <a href="{{ route('game-list.create') }}">Create Game</a>
                @endcan

                @auth
                    <form action="{{ route('logout') }}" method="post">
                        @csrf

                        <button type="submit">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
        </header>

        <main>@yield('content')</main>
    </div>
</body>
</html>
