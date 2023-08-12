<?php

namespace App\Observers;

use App\Models\Genre;
use Illuminate\Support\Facades\Cache;

class GenreObserver
{
    /**
     * Handle the Genre "created" event.
     */
    public function created(Genre $genre): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Genre "updated" event.
     */
    public function updated(Genre $genre): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Genre "deleted" event.
     */
    public function deleted(Genre $genre): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Genre "restored" event.
     */
    public function restored(Genre $genre): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Genre "force deleted" event.
     */
    public function forceDeleted(Genre $genre): void
    {
        $this->updateCache();
    }

    private function updateCache(): void
    {
        Cache::forget('genres');

        Cache::rememberForever('genres', function () {
            return Genre::query()->orderBy('name')->get();
        });
    }
}
