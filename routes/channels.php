<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user) {
    return (boolean) App\Models\User::find($user)->status;
});

Broadcast::channel('users.online', function ($user) {
    return true;
});

Broadcast::channel('message.{id}', function ($user, $id) {
    // Se for minha mensagem ou enderecada para mim
    if ($user->id == Auth::user()->id) {
        return true;
    }

    if ($message->to == Auth::user()->id) {
        return true;
    }

    return true;
});


Broadcast::channel('room.{id}', function ($user) {
    return true;
});
