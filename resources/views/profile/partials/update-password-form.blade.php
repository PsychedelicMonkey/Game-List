<section>
    <header>
        <h2 class="text-3xl font-semibold mb-4">Update Password</h2>

        @if(session('status') === 'password-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 3000)"
                class="bg-gray-500 text-center text-white text-lg rounded-lg my-6 py-2"
            >
                Your password is updated!
            </p>
        @endif

        <x-form.main :action="route('password.update')">
            @method('PUT')

            <x-input.main
                type="password"
                id="current_password"
                label="Current Password"
                :messages="$errors->updatePassword->get('current_password')"
            />

            <x-input.main
                type="password"
                id="password"
                label="Password"
                :messages="$errors->updatePassword->get('password')"
            />

            <x-input.main
                type="password"
                id="password_confirmation"
                label="Confirm Password"
                :messages="$errors->updatePassword->get('password_confirmation')"
            />

            <x-button.main label="Update Password" />
        </x-form.main>
    </header>
</section>
