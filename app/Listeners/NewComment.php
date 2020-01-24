<?php

namespace App\Listeners;

use App\Events\CommentNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewComment
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
     * @param  CommentNotification  $event
     * @return void
     */
    public function handle(CommentNotification $event)
    {
        //
    }
}
