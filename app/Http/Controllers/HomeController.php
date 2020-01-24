<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Post;
use App;

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
       // $post = Post::latest()->paginate(5);
       // return view('home',compact('user'));  
       //Setting the session
        $id = $user->id;
        $email = $user->email;
        session(['id' => $id, 'email' => $email]);
        $value = $request->session()->pull('email');
        
        return view('home',compact('post','value'));
    
    }
    public function showNotif()
    {
        // /event(new App\Events\CommentNotification('test'));
        return view('Notification');
        
    }
}
