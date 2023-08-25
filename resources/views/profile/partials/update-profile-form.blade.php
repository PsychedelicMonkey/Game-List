<section>
    <header>
        <h2 class="text-3xl font-semibold mb-4">{{ __('Edit Your Profile') }}</h2>

        <div class="mb-3">
            <img src="{{ $user->profile->gravatar_image }}&s=120" alt="" />

            {{-- TODO: Upload image form --}}
        </div>
    </header>

    @if(session('status') === 'profile-updated')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 3000)"
            class="bg-gray-500 text-center text-white text-lg rounded-lg my-6 py-2"
        >
            {{ __('Your profile is updated!') }}
        </p>
    @endif

    <form id="send-verification" action="{{ route('verification.send') }}" method="post">
        @csrf
    </form>

    <x-form.main :action="route('profile.update')">
        @method('PATCH')

        <x-input.main id="name" :label="__('Name')" :value="old('name', $user->name)" />

        <x-input.main type="email" id="email" :label="__('Email Address')" :value="old('email', $user->email)" />

        @if($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <h3>{{ __('Your email address is not verified.') }}</h3>
                <button form="send-verification">{{ __('Click here to re-send the verification email.') }}</button>

                @if(session('status') === 'verification-link-sent')
                    <p>{{ __('A new verification link has been sent to your email address.') }}</p>
                @endif
            </div>
        @endif

        {{-- TODO: profile bio input --}}

        <x-button.main />
    </x-form.main>
</section>
