<?php

namespace App\Listeners;

use App\Events\CommentEvent;
use App\CustomClass\PusherSetup;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pusher\Pusher;
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
       $pusher = PusherSetUp::getPusher();
       $data =  $event->data;
       $pusher->trigger('post'.$data['post_id'], $data['event'], $data);
    }
}
