<?php

namespace App\Events;

use App\Models\User;
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
    private User $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $message, User $user)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('private.chat.' . $this->user->getAttribute("id"));
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
        // set 3 seconds before broadcast the data
        // the purpose of this is for make sure if we f5 the page, it will continues to handle the code and broadcast the event
        // also, i've tried to broadcast 2 time, and it's still work, it's not blocking
        sleep(3);
        return ['message' => $this->message, 'user' => $this->user->only(['name', 'email'])];
    }
}