<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App;
use App\Events\CommentEvent;

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
    
        //return count($test->comment);

        //paginate for comments no next and prev yet
        $post = Post::where("user_id", "=", $id)->latest()->paginate(2);
        $test = Post::where("user_id",Auth::id())
            ->with(['comment' => function ($query) {
                   $query->where('status',1);
            }])->get();
        view()->share('key', count($test[0]->comment));
        //return $test;
        return view('home',compact('post'));

    
    }
    public function ask(){

        return view('askQuestion');
    }

    public function seeBody($id)
    {
        $sortDirection = 'desc';
        $seeBody = Post::where("id", $id)
        ->with(['comment.user' => function ($query) {
               $query->latest();
        }])->get();
        
        return view('comment',compact('seeBody'));
        
       
        //return $seeBody;
    }

   

  
   
      

}
