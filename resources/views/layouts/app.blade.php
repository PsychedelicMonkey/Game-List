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
    <header>
        <x-navbar />
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>
