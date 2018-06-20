<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Reply  extends Model
{

    protected $table = 'replies';
    protected $fillable = ['post_id','body'];
    protected $hidden = [];

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function post(){
        return $this->belongsTo('App\Post');
    }
}