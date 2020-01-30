<?php

namespace App\CustomClass;

use Pusher\Pusher;

class PusherSetup{

    public function __construct()
    {

    }

    public static function getPusher()
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        
        );      

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), 
            $options
        );
        return $pusher;
    }
}
?>