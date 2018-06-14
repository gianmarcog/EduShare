<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'role';
    protected $fillable = ['user_id', 'role'];

    public function users()
    {
        return $this->belongsToMany('User', 'role');
    }
}
