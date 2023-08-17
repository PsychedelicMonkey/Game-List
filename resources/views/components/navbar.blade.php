<nav class="fixed w-full flex justify-center items-center gap-2 bg-purple-600 dark:bg-purple-800 text-white h-14">
    <x-navbar-link :href="url('/')">Home</x-navbar-link>
    <x-navbar-link :href="route('game-list.index')">Game List</x-navbar-link>

    @can('create', \App\Models\Game::class)
        <x-navbar-link :href="route('game-list.create')">Create Game</x-navbar-link>
    @endcan

    @auth
        <x-navbar-link :href="route('profile.edit')">Profile</x-navbar-link>

        <form action="{{ route('logout') }}" method="post" class="inline-block">
            @csrf

            <button class="text-white text-lg no-underline uppercase font-semibold hover:underline" type="submit">
                Log Out <i class="fa-solid fa-right-from-bracket"></i>
            </button>
        </form>
    @else
        <x-navbar-link :href="route('login')">
            Login <i class="fa-solid fa-right-to-bracket"></i>
        </x-navbar-link>
        <x-navbar-link :href="route('register')">Register</x-navbar-link>
    @endauth

    <button id="system-theme" onclick="toDarkTheme()">
        <i class="fa-solid fa-circle-half-stroke"></i>
    </button>
    <button id="dark-theme" onclick="toLightTheme()">
        <i class="fa-solid fa-moon"></i>
    </button>
    <button id="light-theme" onclick="toSystemTheme()">
        <i class="fa-solid fa-sun"></i>
    </button>
</nav>
