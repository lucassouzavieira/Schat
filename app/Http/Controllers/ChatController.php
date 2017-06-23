<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ChatController extends Controller
{
    protected $message;
    protected $user;

    public function __construct()
    {
        $this->message = new Message();
        $this->user = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $chats = $this->message->chats();

            $chatsInfo = [];
            foreach ($chats as $chat){
                $user = User::find($chat->to);
                $info['name'] = $user->name;
                $chatsInfo[] = $info;
            }


            return view('chat.index', [
                'chats' => $chatsInfo
            ]);
        } catch (\Exception $exception) {
            if(env('APP_DEBUG')){
                throw $exception;
            }

            return redirect()->route('home');
        }

    }

    public function users()
    {
        return view('chat.users', [
            'online' => $this->user->online()
        ]);
    }
}
