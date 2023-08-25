<?php

namespace App\Providers;

use App\Events\GameImageCreated;
use App\Listeners\FormatGameImage;
use App\Models\Game;
use App\Models\Genre;
use App\Models\User;
use App\Observers\GameObserver;
use App\Observers\GenreObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        GameImageCreated::class => [
            FormatGameImage::class,
        ],
    ];

    protected $observers = [
        Game::class => [GameObserver::class],
        Genre::class => [GenreObserver::class],
        User::class => [UserObserver::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
