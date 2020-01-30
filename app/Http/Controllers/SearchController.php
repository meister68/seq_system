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
          if(strlen($request->name) == 1){
            $posts = Post::where('title', 'LIKE', "%$request->name%");
            
          }else{
              $query_string = explode(" ", $request->name);
              foreach($query_string as $key => $value){
                $posts = Post::where('title', 'LIKE', "%$value%")->get();
              }
          }
        }
        return view('home',['post'=> $posts]);
    }
}
