<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private string $message;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $message)
    {
        $this->message = $message;
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
        return new Channel('public.chat.1');

        // set private channel
        // return new PrivateChannel('private.chat.1');
    }

    // rename the event name in terminal and from /laravel-sockets
    // by default, the event named "App\\Events\\PlaygroundEvent"
    public function broadcastAs()
    {
        return 'chat-message';
    }

    // set data to the event
    public function broadcastWith()
    {
        // set 5 seconds before broadcast the data
        // the purpose of this is for make sure if we f5 the page, it will continues to handle the code and broadcast the event
        // also, i've tried to broadcast 2 time, and it's still work, it's not blocking
        sleep(5);
        return ['message' => $this->message];
    }
}
