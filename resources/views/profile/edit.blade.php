@extends('partials.app')

@section('content')
    <h1 class="text-3xl font-semibold underline my-4">Edit Profile</h1>

    @if(session('status') === 'profile-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
           class="bg-gray-500 text-center text-white text-lg rounded-lg my-6 py-2"
        >
            Your profile is updated!
        </p>
    @endif

    <form id="send-verification" action="{{ route('verification.send') }}" method="post">
        @csrf
    </form>

    <x-form.main :action="route('profile.update')">
        @method('PATCH')

        <x-input.main id="name" label="Name" :value="old('name', $user->name)" />

        <x-input.main type="email" id="email" label="Email Address" :value="old('email', $user->email)" />

        @if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <h3>Your email address is not verified.</h3>
                <button form="send-verification">Click here to re-send the verification email.</button>

                @if(session('status') === 'verification-link-sent')
                    <p>A new verification link has been sent to your email address.</p>
                @endif
            </div>
        @endif

        <x-button.main />
    </x-form.main>

    <section>
        <header>
            <h2 class="text-3xl font-semibold my-4">Update Password</h2>

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

    <section class="space-y-6">
        <header>
            <h2 class="text-3xl font-semibold my-4">Delete Account</h2>
            {{-- TODO: Change the warning message --}}
            <p>Once your account is deleted, all of your data will be deleted.</p>

            <x-form.main :action="route('profile.destroy')">
                @method('DELETE')

                <x-input.main
                    type="password"
                    id="password"
                    label="Password"
                    placeholder="Password"
                    :messages="$errors->userDeletion->get('password')"
                />

                <x-button.main color="red" label="Delete" />
            </x-form.main>
        </header>
    </section>
@endsection
