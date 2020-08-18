<?php

namespace App\Listeners;

use App\Mail\ProjectCreated as ProjectCreatedMail;
use App\Events\ProjectCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProjectCreatedNotification
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
     * @param  ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreated $event)
    {
        \Mail::to($event->project->users->email)->send(
            new ProjectCreatedMail($event->project));
        
    }
}
