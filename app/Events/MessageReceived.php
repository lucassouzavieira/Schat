<?php

namespace App\Events;

use App\Models\User;
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

    public $message;

    public function __construct(array $message)
    {
        $this->message = $message;

        $user = User::find($message['from']);
        $this->message['user'] = $user->name;
    }

    /**
     * Define quem pode ouvir os eventos de mensagem
     * @return Channel
     */
    public function broadcastOn()
    {
        if (array_key_exists('room', $this->message) && $this->message['room']) {
            return new PrivateChannel('message.' . $this->message['room']);
        }

        return new PrivateChannel('message.' . $this->message['to']);
    }
}
