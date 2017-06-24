<?php

namespace App\Listeners;

use App\Events\UserOnline;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUserOnline
{
    protected $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Handle the event.
     *
     * @param  UserOnline  $event
     * @return void
     */
    public function handle(UserOnline $event)
    {
        $this->user->updateStatus(1);
    }
}
