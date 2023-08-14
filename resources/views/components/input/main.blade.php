<div class="flex flex-col mb-2">
    <label for="{{ $id }}" class="text-lg mb-1">
        {{ $label }}
    </label>
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $id }}"
        id="{{ $id }}"
        value="{{ $value ?? old($id) }}"
        class="bg-transparent rounded-lg"
    />

    @error($id)
    <p class="font-semibold text-lg text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
