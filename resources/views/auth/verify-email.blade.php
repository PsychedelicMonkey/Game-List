<x-app-layout>
    <h1 class="text-3xl font-semibold underline">{{ __('Verify your email') }}</h1>

    @if(session()->has('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="{{ route('verification.send') }}" method="post">
        @csrf

        <button type="submit">{{ __('Send verification link') }}</button>
    </form>
</x-app-layout>
