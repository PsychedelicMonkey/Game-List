<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;
use Spatie\Tags\Tag;

class TagObserver
{
    /**
     * Handle the Tag "created" event.
     */
    public function created(Tag $tag): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Tag "updated" event.
     */
    public function updated(Tag $tag): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Tag "deleted" event.
     */
    public function deleted(Tag $tag): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Tag "restored" event.
     */
    public function restored(Tag $tag): void
    {
        $this->updateCache();
    }

    /**
     * Handle the Tag "force deleted" event.
     */
    public function forceDeleted(Tag $tag): void
    {
        $this->updateCache();
    }

    private function updateCache(): void
    {
        Cache::forget('tags');

        Cache::rememberForever('tags', function () {
            return Tag::orderBy('name')->get();
        });
    }
}
