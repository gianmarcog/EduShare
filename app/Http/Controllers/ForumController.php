<?php
namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ForumController extends Controller
{
    public function get_post()
    {
        function __construct()
        {
            $this->middleware('auth');
        }
        $categories = Category::all();
        return view('forum', compact('categories'));
    }
    /**
     * @param Request $request
     */
    public function postQuestion(CreatePostRequest $request)
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->category_id = $request['category'];
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();
        return redirect('/forum/release');
    }

    public function viewPost($slug){

        try
        {
        $post = Post::where('slug', '=', $slug)->first();

        return redirect()->route('reply',compact('post'),[$post->slug]);
        }
        catch (ModelNotFoundException $ex){
            return redirect('/');
        }
    }
}