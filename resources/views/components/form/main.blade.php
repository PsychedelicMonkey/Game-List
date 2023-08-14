<form action="{{ $action }}" method="post" {{ $attributes }}>
    @csrf

    <div class="grid gap-2 mx-w-xl">
        {{ $slot }}
    </div>
</form>
