<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function broadcastWith()
    {
        return [
            "name" => $this->name,
        ];
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['channel1'];
    }
    public function broadcastAs()
    {
        return 'log-message';
    }
}
