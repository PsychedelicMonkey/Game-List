<x-error-layout>
    <div class="absolute top-0 left-0 w-full h-screen flex justify-center items-center overflow-hidden">
        <div class="p-4 max-w-7xl mx-auto text-center space-y-10">
            <h1 class="text-9xl text-gray-500 font-bold">500</h1>

            <div class="w-full mx-auto space-y-5">
                <h3 class="text-3xl font-semibold">{{ __('Oops, something is wrong with our servers.') }}</h3>

                <h5 class="text-xl text-gray-800 dark:text-gray-400">
                    {{ __('Our development team has been notified of the error. Please contact us if the error persists.') }}
                </h5>

                <x-button.main :href="url('/')" class="px-8">
                    {{ __('Back to homepage') }}
                </x-button.main>
            </div>
        </div>
    </div>
</x-error-layout>
