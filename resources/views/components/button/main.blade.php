@props([
    'color' => 'blue',
    'label' => __('Submit'),
    'href' => null,
])

@isset($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge([
        'class' => 'inline-block bg-'.$color.'-600 border-2 border-'.$color.'-600 text-white text-xl py-2 rounded-lg duration-200 hover:bg-transparent hover:text-'.$color.'-600 no-underline'
    ]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        type="submit"
        {{ $attributes->merge([
            'class' => 'bg-'.$color.'-600 border-2 border-'.$color.'-600 text-white text-xl py-2 rounded-lg duration-200 hover:bg-transparent hover:text-'.$color.'-600'
        ]) }}
    >
        {{ $label }}
    </button>
@endisset
