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

    @include ('layouts.theme')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 text-black dark:bg-gray-900 dark:text-white">
<div class="flex flex-col justify-between h-screen">
    @include('layouts.header')

    <main class="pt-14 mb-auto">
        <div class="px-4 mb-10 max-w-7xl mx-auto">
            {{ $slot }}
        </div>
    </main>
</div>
</body>
</html>
