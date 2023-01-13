<?php

namespace App\Listeners;

use App\Events\TaskAssignedEvent;
use App\Notifications\TaskAssignedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TaskAssignedListener implements ShouldQueue
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
     * @param  \App\Events\TaskAssignedEvent  $event
     * @return void
     */
    public function handle(TaskAssignedEvent $event)
    {
        // Log::info("Task is assigned to " . $event->task->owner->name);
        $event->task->assignee->notify(new TaskAssignedNotification($event->task));
    }
}
