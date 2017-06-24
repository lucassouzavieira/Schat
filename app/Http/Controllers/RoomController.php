<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $room;

    public function __construct()
    {
        $this->room = new Room();
    }

    public function index()
    {
        $rooms = Room::all();

        return view('room.index', [
            'rooms' => $rooms
        ]);
    }

    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        try {
            $room = new Room();
            $room->fill($request->except(['_token', '_method']));
            $room->save();
            return redirect()->route('room.index');
        } catch (\Exception $e) {
            if (env('APP_DEBUG')) {
                throw $e;
            }

            return redirect()->route('room.index');
        }
    }

    public function show($id)
    {

    }
}
