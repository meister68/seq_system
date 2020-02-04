<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CommentEvent' => [
            'App\Listeners\CommentEventListener',
        ],
        'App\Events\NotificationEvent' => [
            'App\Listeners\NotificationEventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */


    public function shouldDiscoverEvents()
    {
        return true;
    }
    public function boot()
    {
        parent::boot();

        //
    }

   
}
