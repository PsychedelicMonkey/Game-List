{{-- TODO: Small & medium screen styles --}}

<nav class="fixed w-full h-14 z-50 bg-purple-600 dark:bg-purple-800 text-white">
    <div class="max-w-7xl mx-auto h-full">
        <div class="h-full flex items-center gap-4">
            {{-- Left side --}}
            <div class="flex gap-2">
                <x-navbar-link :href="url('/')">{{ __('Home') }}</x-navbar-link>

                <x-navbar-link :href="route('game-list.index')">{{ __('Game List') }}</x-navbar-link>

                @can('create', \App\Models\Game::class)
                    <x-navbar-link :href="route('game-list.create')">{{ __('Create Game') }}</x-navbar-link>
                @endcan
            </div>

            {{-- Center --}}
            <div class="grow">
                <form action="{{ route('search') }}">
                    <div class="h-10 flex rounded-full">
                        <input
                            type="text"
                            name="search"
                            id="search"
                            placeholder="{{ __('Search') }}"
                            class="w-full rounded-l-full border-0 bg-purple-700 dark:bg-purple-900 placeholder-gray-300"
                        />

                        <button type="submit" class="px-6 rounded-r-full bg-purple-500 dark:bg-purple-600">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>

            {{-- User Auth --}}
            <div class="flex gap-2">
                @auth
                    <x-navbar-link :href="route('profile.edit')">{{ __('Profile') }}</x-navbar-link>

                    <form action="{{ route('logout') }}" method="post" class="inline-block">
                        @csrf

                        <button class="text-white text-lg no-underline lowercase font-semibold hover:underline" type="submit">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                @else
                    <x-navbar-link :href="route('login')">{{ __('Login') }}</x-navbar-link>

                    <x-navbar-link :href="route('register')">{{ __('Register') }}</x-navbar-link>
                @endauth
            </div>

            {{-- Theme button --}}
            <div class="flex text-lg text-center w-8">
                <button id="system-theme" class="w-full" onclick="toDarkTheme()">
                    <i class="fa-solid fa-circle-half-stroke"></i>
                </button>

                <button id="dark-theme" class="w-full" onclick="toLightTheme()">
                    <i class="fa-solid fa-moon"></i>
                </button>

                <button id="light-theme" class="w-full" onclick="toSystemTheme()">
                    <i class="fa-solid fa-sun"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
