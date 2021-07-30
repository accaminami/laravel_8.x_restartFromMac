<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PublishProcessor
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $int;

    public function __construct(int $int)
    {
        $this->int = $int;
    }

    public function getInt(): int
    {
        return $this->int;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
