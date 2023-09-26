<footer class="bg-white dark:bg-gray-800">
    <div class="mx-auto max-w-7xl p-4 py-6 lg:py-8">
        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
                <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                    {{ __('Navigation') }}
                </h2>

                <ul class="text-gray-500 dark:text-gray-400 font-medium space-y-2">
                    <li>
                        <a href="{{ url('/') }}" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('About') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('game-list.index') }}" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Game List') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Blog') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                    {{ __('Follow Me') }}
                </h2>

                <ul class="text-gray-500 dark:text-gray-400 font-medium space-y-2">
                    <li>
                        <a href="#" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Discord') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Github') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                    {{ __('Legal') }}
                </h2>

                <ul class="text-gray-500 dark:text-gray-400 font-medium space-y-2">
                    <li>
                        <a href="#" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Privacy Policy') }}
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-black dark:text-white no-underline hover:underline">
                            {{ __('Terms of Use') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
                &copy; {{ date('Y') }} Game List
            </span>

            <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white no-underline">
                    <i class="fa-brands fa-discord"></i>
                </a>

                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white no-underline">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white no-underline">
                    <i class="fa-brands fa-twitter"></i>
                </a>

                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white no-underline">
                    <i class="fa-brands fa-github"></i>
                </a>

                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white no-underline">
                    <i class="fa-brands fa-steam"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
