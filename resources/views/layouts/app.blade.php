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

    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            document.documentElement.setAttribute('data-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            document.documentElement.setAttribute('data-theme', 'light');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-black dark:bg-gray-900 dark:text-white">
    <header>
        <x-navbar />
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <script>
        document.querySelector('#theme-btn').innerHTML = document.documentElement.dataset.theme;
    </script>
</body>
</html>
