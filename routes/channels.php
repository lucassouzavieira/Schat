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

Broadcast::channel('message.{id}', function ($id){
//    $message = \App\Models\Message::find($id);
//
//    // Se for minha mensagem ou enderecada para mim
//    if($message->from == Auth::user()->id){
//        return true;
//    }
//
//    if($message->to == Auth::user()->id){
//        return true;
//    }
//
//    // Se for uma mensagem para uma das salas que eu participo
//    if(!is_null($message->room && in_array($message->room, Auth::user()->rooms()))){
//        return true;
//    }
//
    return true;
});
