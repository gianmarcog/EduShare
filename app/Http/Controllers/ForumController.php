<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Http\Requests\CreatePostRequest;



class ForumController extends Controller
{
    public function get_post(){
        function __construct(){
            $this ->middleware('auth');
        }
        $categories = Category::all();
        return view('forum',compact('categories'));
    }

    /**
     * @param Request $request
     */
    public function postQuestion(CreatePostRequest $request){
         $post = new Post();
         $post->category_id = $request['category'];
        $post->title = $request['title'];
        $post->body = $request['body'];

        $post->save();

        return redirect('/forum/release');
    }
}
