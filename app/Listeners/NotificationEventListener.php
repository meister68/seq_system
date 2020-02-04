<?php

namespace App\Listeners;

use App\Events\NotificationEvent;
use App\CustomClass\PusherSetup;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificationEventListener
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
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        $pusher = PusherSetUp::getPusher();
        $data = $event->data;
        $pusher->trigger('user'.session('posted_by'), 'send-notification-event', $data);
    }
}
