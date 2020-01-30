<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App;
use App\Events\CommentEvent;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
       
       
        
        
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id;
    

        //paginate for comments no next and prev yet
        $post = Post::where("user_id", "=", $id)->latest()->paginate(2);
        $unread_comment = Post::where("user_id",Auth::id())->with(['comment' => function ($query) {$query->where('status',1);}])->get();
        session(['count' => count($unread_comment[0]->comment),'id' => $id ]);
        return view('home',compact('post'));

    
    }
    public function ask(){
       
        return view('askQuestion');
    }

    public function seeBody($post_id)
    {
        $sortDirection = 'desc';
        $seeBody = Post::where("id", $post_id)->with(['comment.user' => function ($query) {$query->latest();}])->get();
        
        Comment::where('post_id', $post_id)->update(['status' => 0]);
        $unread_comment = Post::where("user_id",Auth::id())->with(['comment' => function ($query) {$query->where('status',1);}])->get();
        session(['count' => count($unread_comment[0]->comment), 'post_id' => $post_id ]); //di maabot ang event.
        return view('comment',compact('seeBody'));

        
       
    }

   

  
   
      

}
