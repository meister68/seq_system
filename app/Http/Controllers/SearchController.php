<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;


class SearchController extends Controller
{
    public function search(Request $request) {
        if(empty($request->name)) {
            return redirect('/home');
        } else {
            // $name = explode(" ", $request->name);
            // $data = [$request->name];
            $posts = Post::whereIn('title', [$request->name])->orWhere('title', 'like', "%{$request->name}%")->get();
            return view('home',['post'=> $posts]);
            // ['users' => $user],
        }
    }
}
