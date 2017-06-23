<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $user;
    protected $message;
    protected $room;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = new User();
        $this->message = new Message();
        $this->room = new Room();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'online' => $this->user->online(),
            'messages' => $this->message->all()->count(),
            'rooms' => $this->room->all()->count()
        ]);
    }
}
