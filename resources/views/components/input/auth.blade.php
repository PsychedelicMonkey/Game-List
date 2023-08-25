@props([
    'disabled' => false,
    'id',
    'label',
    'placeholder' => null,
    'type' => 'text',
    'value' => old($id),
])

<div class="flex flex-col mb-4">
    <label for="{{ $id }}" class="text-white font-semibold text-xl drop-shadow-lg mb-3">
        {{ $label }}
    </label>

    <input
        type="{{ $type }}"
        name="{{ $id }}"
        id="{{ $id }}"
        value="{{ $value }}"
        class="bg-purple-800 dark:bg-purple-900 text-white p-2 rounded-lg border-2 border-purple-800 dark:border-purple-900"
    />

    @error($id)
    <p class="text-purple-200 font-semibold text-lg mt-1">{{ $message }}</p>
    @enderror
</div>
