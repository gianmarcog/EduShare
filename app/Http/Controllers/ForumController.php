<?php
namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateReplyRequest;
use App\Post;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Redirect;

//include 'functions.php'; Befehle zum Debuggen
//debug_to_console($var);

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

    public function saveReply(CreateReplyRequest $request){

        $post=Post::where('id', '=', $request->get('id'))->first();

        if($post) {
            $reply = new Reply();
            $reply->post_id = $post->id;
            $reply->user_id = Auth::user()->id;
            $reply->body = $request->get('body');
            $reply->save();

            return redirect()->back();
        }
        return redirect('/');
    }

    public function deleteQuestion(Request $request)
    {
        $var = $request->get('post_id');
        $post = Post::where('id', '=', $var)->first();


        if ($post->delete()) {
            return redirect()->back();
        }
    }

        public function deleteReply(Request $request)
    {
        $var = $request->get('reply_id');
        $reply=Reply::where('id', '=',$var)->first();



        if($reply->delete()){
            return redirect()->back();
        }
    }
}