<?php

namespace App\Observers;

use App\Models\Game;
use Illuminate\Support\Facades\Cache;

class GameObserver
{
    /**
     * Handle the Game "created" event.
     */
    public function created(Game $game): void
    {
        $this->resetCache();
    }

    /**
     * Handle the Game "updated" event.
     */
    public function updated(Game $game): void
    {
        $this->resetCache();
    }

    /**
     * Handle the Game "deleted" event.
     */
    public function deleted(Game $game): void
    {
        $this->resetCache();
    }

    /**
     * Handle the Game "restored" event.
     */
    public function restored(Game $game): void
    {
        $this->resetCache();
    }

    /**
     * Handle the Game "force deleted" event.
     */
    public function forceDeleted(Game $game): void
    {
        $this->resetCache();
    }

    private function resetCache(): void
    {
        Cache::forget('game-list');
    }
}
