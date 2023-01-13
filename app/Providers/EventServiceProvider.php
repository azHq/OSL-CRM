<?php

namespace App\Providers;

use App\Events\LeadAssignedEvent;
use App\Listeners\LeadAssignedListener;

use App\Events\TaskAssignedEvent;
use App\Listeners\TaskAssignedListener;

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
        LeadAssignedEvent::class => [
            LeadAssignedListener::class,
        ],
        TaskAssignedEvent::class => [
            TaskAssignedListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
