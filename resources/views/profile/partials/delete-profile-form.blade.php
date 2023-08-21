<section>
    <header class="mb-4">
        <h2 class="text-3xl font-semibold mb-2">{{ __('Delete Account') }}</h2>
        {{-- TODO: Change the warning message --}}
        <p>{{ __('Once your account is deleted, all of your data will be deleted.') }}</p>
    </header>

    <x-form.main :action="route('profile.destroy')">
        @method('DELETE')

        <x-input.main
            type="password"
            id="password"
            label="{{ __('Password') }}"
            placeholder="{{ __('Password') }}"
            :messages="$errors->userDeletion->get('password')"
        />

        <x-button.main color="red" label="{{ __('Delete') }}" />
    </x-form.main>
</section>
