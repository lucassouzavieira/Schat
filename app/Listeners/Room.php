<?php

namespace App\Listeners;

use App\Events\JoinRoom;
use App\Models\RoomUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class Room
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  JoinRoom  $event
     * @return void
     */
    public function handle(JoinRoom $event)
    {
        $roomUser = new RoomUser();
        $roomUser->fill([
            'room' => $event->getRoom(),
            'user' => Auth::user()->id
        ]);
        $roomUser->save();
    }
}
