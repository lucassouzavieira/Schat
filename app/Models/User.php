<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'from');
    }

    public function online()
    {
        return $this->where('status', '=', 1)->get();
    }

    public function updateStatus($status = 0)
    {
        return $this->where('id', '=', Auth::user()->id)->update(['status' => $status]);
    }
}
