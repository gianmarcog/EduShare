<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'hochschule', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function roles()
    {
        return $this->belongsToMany('Role', 'role');
    }

    public function isAdmin()
    {
        $role = role::where('user_id', '=', $this->id)->first();
        if ($role->role === 1) {
            return true;
        } else {
            return false;
        }
    }

    public function makeRole($title)
    {
        $role = new role();
        $role->user_id = $this->id;
        if ($title === 'admin') {
            $role->role = 1;
        } elseif ($title === 'user') {
            $role->role = 0;
        }
        $role->save();
    }


}
