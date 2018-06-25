<?php
namespace App\Http\Controllers;
Use App\Post;
use App\Category;
use App\role;
use Illuminate\Http\Request;
Use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home(){
        $posts = Post::orderBy('created_at','DESC')->paginate(5);
        $categories = Category::all();
        $role = role::where('user_id','=',Auth::user()->id)->first();
        return view('forumRelease')->with('posts',$posts)->with('categories',$categories)->with('role',$role);
    }
}