@props(['color' => 'blue', 'label' => 'Submit'])

<button
    type="submit"
    {{ $attributes->merge([
        'class' => 'bg-'.$color.'-600 border-2 border-'.$color.'-600 text-white text-xl py-3 rounded-lg duration-200 hover:bg-transparent hover:text-'.$color.'-600'
    ]) }}
>
    {{ $label }}
</button>
