<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hochschulen extends Model
{
    protected $table = 'hochschulen';
    protected $fillable = ['name', 'standort','url'];
}
