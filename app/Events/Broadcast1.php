<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Broadcast1 extends Event implements ShouldBroadcast
{
    use SerializesModels;


    // This the variable for "Power". It should be declared here. Otherwise it won't pass 
    // data to socket.js.

    public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->data = array(
            'power'=> '10'
            );
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['test-channel'];

    }
}

