<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Post;

class SearchController extends Controller
{
    public function index(Request $request){
        $users = User::where('name','LIKE', '%'.$request->q.'%')->orWhere('details', 'LIKE', '%'.$request->q.'%')->get();
        $posts = Post::where('title','LIKE', '%'.$request->q.'%')->orWhere('details', 'LIKE', '%'.$request->q.'%')->get();
        return view('search')->with([
            'users' => $users,
            'posts' => $posts
        ]);
    }
}
