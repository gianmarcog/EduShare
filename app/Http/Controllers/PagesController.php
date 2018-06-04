<?php
namespace App\Http\Controllers;
Use App\Post;
use Illuminate\Http\Request;
Use App\Http\Requests;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    public function home(){
        $posts = Post::all();
        return view('forumRelease')->with('posts',$posts);
    }
}