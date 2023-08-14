<div class="flex flex-col mb-4">
    <label for="{{ $id }}" class="text-white font-semibold text-xl drop-shadow-lg mb-3">
        {{ $label }}
    </label>

    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $id }}"
        id="{{ $id }}"
        value="{{ $value ?? old($id) }}"
        class="bg-purple-800 text-white p-2 rounded-lg border-2 border-purple-800"
    />

    @error($id)
    <p class="text-purple-200 font-semibold text-lg mt-1">{{ $message }}</p>
    @enderror
</div>
