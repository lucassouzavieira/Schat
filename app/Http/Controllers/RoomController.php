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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
