<?php
namespace App\Http\Controllers;
Use App\Post;
use Illuminate\Http\Request;
Use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function home(){
        $posts = Post::orderBy('created_at','DESC')->paginate(5);
        return view('forumRelease')->with('posts',$posts);
    }
}