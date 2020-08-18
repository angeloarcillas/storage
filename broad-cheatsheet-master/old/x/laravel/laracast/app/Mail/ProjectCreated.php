<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * SEE MAIL DOCS
 * 
 */

class ProjectCreated extends Mailable
{
    use Queueable, SerializesModels;

    // public var can be used to markdown (view)
    public $project;
    
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        //
        $this->project = $project;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail-Project-Created');
    }
}
