<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $message;

    public function __construct(array $message)
    {
        $this->message = $message;
    }

    /**
     * Define quem pode ouvir os eventos de mensagem
     * @return PrivateChannel
     */
    public function broadcastOn()
    {
        if ($this->message['room']) {
            return new PrivateChannel('message' . $this->message['room']);
        }

        return new PrivateChannel('message' . $this->message['to']);
    }
}
