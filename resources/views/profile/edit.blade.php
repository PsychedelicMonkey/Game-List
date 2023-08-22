<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-8">
            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-form')
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-profile-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
