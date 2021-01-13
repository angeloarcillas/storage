<?php
namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


/**
 * [ CUSTOME EVENT ]
 * php artisan make:event ProjectCreatedEvent // past tense
 */

class ProjectCreated
{
    use Dispatchable, SerializesModels;

    public $project;

    public function __construct($project)
    {
        $this->project = $project;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
