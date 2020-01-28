<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;


class SearchController extends Controller
{
    public function search(Request $request) {
        if(empty($request->name)) {
            return redirect('/');
        } else {
            $posts = Post::query()
            ->where('title', 'LIKE', "%{$request->name}%")->get();
            // $user = User::whereName($request->name)->get();
            return view('home',
            // ['users' => $user],
            ['post'=> $posts] 
        );
        }
    }
}
