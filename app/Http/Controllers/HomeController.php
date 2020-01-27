<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
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
        $user = Auth::user();
        $id = $user->id;
        $email = $user->email;
        session(['id' => $id, 'email' => $email]);
        $value = $request->session()->pull('email');

        $post = Post::where('user_id',$id);
       // $post = Post::all();
        
        return view('home',compact('post','value'));
    
    }
    
    public function ask(){
        return view('askQuestion');
    }

   
      

}
