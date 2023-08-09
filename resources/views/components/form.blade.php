<form action="{{ $route }}" method="post">
    @csrf

    <div class="grid gap-2 mx-w-xl">
        {{ $slot }}
    </div>
</form>
