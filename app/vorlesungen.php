<?php
/**
 * Created by IntelliJ IDEA.
 * User: rene
 * Date: 02.05.18
 * Time: 11:11
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class vorlesungen extends Model
{
    protected $table = 'vorlesungen';
    protected $fillable = ['name', 'professor'];
}