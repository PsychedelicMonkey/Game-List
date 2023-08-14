<div class="flex flex-col mb-2">
    <label for="{{ $id }}" class="text-lg mb-1">
        {{ $label }}
    </label>
    <textarea
        name="{{ $id }}"
        id="{{ $id }}"
        cols="30"
        rows="10"
        class="bg-transparent rounded-lg"
    >
        {{ $value ?? old($id) }}
    </textarea>

    @error($id)
    <p class="font-semibold text-lg text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
