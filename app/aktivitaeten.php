<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aktivitaeten extends Model
{
    protected $table = 'aktivitaeten';
    protected $fillable = ['name', 'standort'];
}