<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class JoinRoom
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $room;

    public function __construct($room)
    {
        $this->room = $room;
    }

    public function getRoom()
    {
        return $this->room;
    }
}
