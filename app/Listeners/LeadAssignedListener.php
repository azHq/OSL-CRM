<?php

namespace App\Listeners;

use App\Events\LeadAssignedEvent;
use App\Notifications\LeadAssignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LeadAssignedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LeadAssignedEvent  $event
     * @return void
     */
    public function handle(LeadAssignedEvent $event)
    {
        // Log::info("Lead is assigned to " . $event->lead->owner->name);
        $event->lead->owner->notify(new LeadAssignedNotification($event->lead));
    }
}
