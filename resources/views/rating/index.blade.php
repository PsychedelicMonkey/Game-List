<x-app-layout>
    <h1>Ratings</h1>

    @can('create', App\Models\Rating::class)
        <a href="{{ route('rating.create') }}">{{ __('Create Rating') }}</a>
    @endcan

    @if(count($ratings) > 0)
        <div>
            @foreach($ratings as $rating)
                <div>
                    <h3>{{ $rating->score }} - {{ $rating->title }}</h3>
                    @can('update', $rating)
                        <a href="{{ route('rating.edit', $rating) }}">{{ __('Edit') }}</a>
                    @endcan
                </div>
            @endforeach
        </div>
    @else
        <h3>No ratings found</h3>
    @endif
</x-app-layout>
