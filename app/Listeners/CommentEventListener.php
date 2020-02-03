<?php

namespace App\Listeners;

use App\Events\CommentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class CommentEventListener
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
     * @param  CommentEvent  $event
     * @return void
     */
    public function handle(CommentEvent $event)
    {
        dd($event);
        Log::info(json_encode($event));
    }
}
