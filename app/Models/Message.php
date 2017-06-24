<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'content', 'from', 'to', 'room'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function username()
    {
        if ($this->from == Auth::user()->id) {
            return "Eu";
        }

        $user = User::find($this->from);
        return $user->name;
    }

    public function beetween($user)
    {
        return $this->where('from', '=', Auth::user()->id)
            ->where('to', '=', $user)
            ->orWhere('from', '=', $user)
            ->where('to', '=', Auth::user()->id)
            ->get();
    }

    public function room($id)
    {
        return $this->where('room', '=', $id)->get();
    }

    public function userMessages()
    {
        return $this->where('from', '=', Auth::user()->id)
            ->orWhere('to', '=', Auth::user()->id)
            ->get();
    }

    public function chats()
    {
        return $this->select(DB::Raw('DISTINCT `to`'))
            ->where('from', '=', Auth::user()->id)
            ->get();
    }
}
