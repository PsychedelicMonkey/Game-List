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

    @include('partials.theme')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('partials.header')

    <main>
        <div class="bg-purple-600 dark:bg-purple-800 w-full h-screen flex justify-center items-center">
            <div class="w-3/4 md:w-1/2 lg:w-1/3 xl:w-1/5">
                @if(session()->has('status'))
                    <div class="text-center bg-purple-400 p-2 mb-7 rounded-lg">
                        <p class="font-semibold text-lg">{{ session('status') }}</p>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
