<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $channel;
    public $to;
    public $from;
    public $body;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $channel, string $to, string $from, string $body)
    {
        $this->channel = $channel;
        $this->to = $to;
        $this->from = $from;
        $this->body = $body;
    }

    public function broadcastWith()
    {
        return [
            "channel" => $this->channel,
            "to" => $this->to,
            "from" => $this->from,
            "body" => $this->body,
        ];
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [$this->channel];
    }
    public function broadcastAs()
    {
        return 'log-message';
    }
}
