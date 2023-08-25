@props([
    'disabled' => false,
    'id',
    'label',
    'messages' => null,
    'placeholder' => null,
    'type' => 'text',
    'value' => old($id),
])

<div class="flex flex-col mb-2">
    <label for="{{ $id }}" class="text-lg mb-1">
        {{ $label }}
    </label>
    <input
        {{ $disabled ? 'disabled' : null }}
        type="{{ $type }}"
        name="{{ $id }}"
        id="{{ $id }}"
        value="{{ $value }}"
        class="bg-transparent rounded-lg"
        placeholder="{{ $placeholder }}"
    />

    @isset($messages)
        @foreach((array) $messages as $message)
            <p class="font-semibold text-lg text-red-600 mt-1">{{ $message }}</p>
        @endforeach
    @else
        @error($id)
            <p class="font-semibold text-lg text-red-600 mt-1">{{ $message }}</p>
        @enderror
    @endisset
</div>
