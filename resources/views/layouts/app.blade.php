<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- TODO: Change the description --}}

    <!-- Primary Meta Tags -->
    <meta property="title" content="{{ !empty($title) ? $title : 'Game List' }}">
    <meta property="description" content="This is the Game List website">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ !empty($title) ? $title : 'Game List'}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description" content="This is the Game List website">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="{{ !empty($title) ? $title : 'GameList' }}">
    <meta property="twitter:description" content="This is the Game List website">
    <meta property="twitter:url" content="{{ url()->current() }}">

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

        @include('layouts.footer')
    </div>
</body>
</html>
