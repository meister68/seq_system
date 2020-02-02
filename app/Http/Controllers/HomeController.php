<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\CommentEvent;
use App\Models\Post;
use App\Models\Comment;
use App;
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
    public function getUnreadComment($user_id){
        $result = Post::where("user_id",$user_id)->with(['comment' => function ($query) {$query->where('status',0);}])->get();
        return $result;
    }

    public function index()
    {
        $id = Auth::user()->id;
        $post = Post::where("user_id", $id)->get();
        $unread_comment = $this->getUnreadComment($id);
        $count = (count($unread_comment) == 0) ? (0) : (count($unread_comment[0]->comment));
        session(['count' => $count,'id' => $id, 'post_id' => 0 ]);
        return view('home',compact('post'));
    
    }
    public function ask(){
       
        return view('askQuestion');
    }

    public function seeBody($post_id)
    {
        $id = Auth::user()->id;
        $seeBody = Post::where("id", $post_id)->with(['comment.user' => function ($query) {$query->latest();}])->get();
        Comment::where('post_id', $post_id)->update(['status' => 1]);
        $unread_comment = $this->getUnreadComment($id);
        $count = (count($unread_comment) == 0) ? (0) : (count($unread_comment[0]->comment));
        session(['count' => $count, 'post_id' => $post_id, 'posted_by'=> $seeBody[0]->user_id ]);
        return view('comment',compact('seeBody'));

    }

    public function showNotifications()
    {
        $post = Post::where("user_id", Auth::user()->id)->with([
        'comment'=> function($query){
            $query->where('user_id', '!=',  Auth::user()->id);
        },
        'comment.user' => function ($query) {$query->latest();
        }
        ])->get();
        return view('test', compact('post'));
    }

   

  
   
      

}