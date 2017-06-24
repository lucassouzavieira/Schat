<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'name', 'topic', 'users'
    ];

    public function getOnlineAttribute($value)
    {
        return DB::table('room_has_users')->count();
    }
}
