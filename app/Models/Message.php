<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function beetween($user)
    {
        return $this->where('from', '=', Auth::user()->id)
            ->where('to', '=', $user)
            ->get();
    }

    public function chats()
    {
        return $this->where('from', '=', Auth::user()->id)->groupBy('to')->get();
    }
}
