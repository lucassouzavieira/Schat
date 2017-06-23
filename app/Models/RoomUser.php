<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    protected $table = 'room_has_users';

    protected $fillable = [
        'room', 'user'
    ];
}
