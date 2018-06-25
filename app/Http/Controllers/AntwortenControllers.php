<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Reply;
use App\role;
use Illuminate\Support\Facades\Auth;


class AntwortenControllers extends Controller
{
    public function show($id){
        $antworten = Reply::where('post_id', '=', $id)->get();
        $post = Post::where('id','=',$id)->get();
        $role = role::where('user_id','=',Auth::user()->id)->first();
        return view('reply')->with('replies',$antworten)->with('posts',$post)->with('role',$role);

    }
}
