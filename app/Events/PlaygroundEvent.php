<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PlaygroundEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // by default, this is set as private channel
        // return new PrivateChannel('channel-name');
        
        // we will set it as public channel instead
        return new Channel('public.playground.1');
    }

    // rename the event name in terminal and from /laravel-sockets
    // by default, the event named "App\\Events\\PlaygroundEvent"
    public function broadcastAs()
    {
        return 'playground';
    }

    // set data to the event
    public function broadcastWith()
    {
        return ['test' => 'helloworld'];
    }
}
