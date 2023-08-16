<nav class="flex justify-center items-center gap-2 bg-purple-600 text-white h-14">
    <x-navbar-link :href="url('/')" label="Home" />
    <x-navbar-link :href="route('game-list.index')" label="Game List" />

    @can('create', \App\Models\Game::class)
        <x-navbar-link :href="route('game-list.create')" label="Create Game" />
    @endcan

    @auth
        <x-navbar-link :href="route('profile.edit')" label="Profile" />

        <form action="{{ route('logout') }}" method="post" class="inline-block">
            @csrf

            <button class="text-white text-lg no-underline uppercase font-semibold hover:underline" type="submit">
                Log Out
            </button>
        </form>
    @else
        <x-navbar-link :href="route('login')" label="Login" />
        <x-navbar-link :href="route('register')" label="Register" />
    @endauth

    <button id="system-theme" onclick="toDarkTheme()">System</button>
    <button id="dark-theme" onclick="toLightTheme()">Dark</button>
    <button id="light-theme" onclick="toSystemTheme()">Light</button>
</nav>
