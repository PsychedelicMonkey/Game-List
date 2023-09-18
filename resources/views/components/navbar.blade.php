<nav x-data="{ open: false }" class="fixed w-full h-14 z-50 bg-purple-600 dark:bg-purple-800 text-white">
    <div class="max-w-7xl mx-auto h-full">
        <div class="px-4 hidden lg:flex h-full items-center gap-4">
            {{-- Left side --}}
            <div class="flex gap-2">
                <x-navbar-link :href="url('/')">{{ __('Home') }}</x-navbar-link>

                <x-navbar-link :href="route('game-list.index')">{{ __('Game List') }}</x-navbar-link>

                @can('create', \App\Models\Game::class)
                    <x-navbar-link :href="route('game-list.create')">{{ __('Create Game') }}</x-navbar-link>
                @endcan

                <x-navbar-link :href="route('rating.index')">{{ __('Ratings') }}</x-navbar-link>
            </div>

            {{-- Center --}}
            <x-search-form />

            {{-- User Auth --}}
            <div class="flex gap-2">
                @auth
                    <x-navbar-link :href="route('profile.edit')">{{ __('Profile') }}</x-navbar-link>

                    <form action="{{ route('logout') }}" method="post" class="inline-block">
                        @csrf

                        <button class="text-white text-lg no-underline lowercase font-semibold hover:text-gray-300" type="submit">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                @else
                    <x-navbar-link :href="route('login')">{{ __('Login') }}</x-navbar-link>

                    <x-navbar-link :href="route('register')">{{ __('Register') }}</x-navbar-link>
                @endauth
            </div>

            {{-- Theme button --}}
            <x-theme-button />
        </div>

        {{-- Responsive Menu --}}
        <div class="px-3 relative flex lg:hidden h-full items-center gap-5">
            <button @click="open = !open" class="w-8 h-8 text-xl text-center">
                <i x-show="!open" class="fa-solid fa-bars"></i>
                <i :class="{ 'block': open, 'hidden': ! open }" class="hidden fa-solid fa-x"></i>
            </button>

            <x-search-form />
        </div>

        {{-- Collapse Menu --}}
        <div
            x-cloak
            x-show="open"
            class="lg:hidden p-4 absolute w-72 h-[calc(100vh-3.5rem)] bg-purple-600 dark:bg-purple-800"
            x-transition:enter="transition ease-in-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2"
            x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0"
            x-transition:leave="transition ease-in-out duration-300"
            x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0"
            x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2"
        >
            <div class="h-full flex flex-col gap-1">
                <div class="my-4 pb-3 flex justify-between items-center border-b-2 border-purple-300 dark:border-purple-400">
                    <h3 class="text-3xl font-semibold text-center">{{ __('Game List') }}</h3>

                    <x-theme-button />
                </div>

                <x-navbar-link :href="url('/')">{{ __('Home') }}</x-navbar-link>

                <x-navbar-link :href="route('game-list.index')">{{ __('Game List') }}</x-navbar-link>

                @can('create', \App\Models\Game::class)
                    <x-navbar-link :href="route('game-list.create')">{{ __('Create Game') }}</x-navbar-link>
                @endcan

                <x-navbar-link :href="route('rating.index')">{{ __('Ratings') }}</x-navbar-link>

                @auth
                    <x-navbar-link :href="route('profile.edit')">{{ __('Profile') }}</x-navbar-link>

                    <form action="{{ route('logout') }}" method="post" class="inline-block">
                        @csrf

                        <button class="text-white text-lg no-underline lowercase font-semibold hover:text-gray-300" type="submit">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                @else
                    <x-navbar-link :href="route('login')">{{ __('Login') }}</x-navbar-link>

                    <x-navbar-link :href="route('register')">{{ __('Register') }}</x-navbar-link>
                @endauth
            </div>
        </div>
    </div>
</nav>
