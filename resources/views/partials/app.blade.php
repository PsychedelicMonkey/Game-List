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

    @include ('partials.theme')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 text-black dark:bg-gray-900 dark:text-white">
    <header>
        <x-navbar />
    </header>

    <main>
        <div class="container mb-10">
            @yield('content')
        </div>
    </main>
</body>
</html>
