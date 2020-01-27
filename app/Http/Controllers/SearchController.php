<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Models\Post;


class SearchController extends Controller
{
    public function search(Request $request) {
        if(empty($request->name)) {
            return redirect('/');
        } else {
            $post = Post::all();
            $user = User::whereName($request->name)->get();
            return view('home',
            ['users' => $user],
            ['posts'=> $post] 
        );
        }
    }
}
