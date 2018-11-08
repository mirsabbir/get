<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(){

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts = \Auth::user()->posts()->get();
        return view('posts.show')->with(['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->can('create', Post::class)){
            // save post
            $validatedData = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'details' => 'required',
                'image' =>  'required',
                'price' => 'required',
                'cat' => 'required',
                'sub' => 'required',
            ]);
            $post = new \App\Post;
            $post->title = $request->title;
            $post->details = $request->details;
            $post->price = $request->price;
            $post->sub_id = $request->sub;
            $file = $request->file('image');
            $file->move('uploads', $file->getClientOriginalName());
            $post->image = 'uploads/'.$file->getClientOriginalName();
            \Auth::user()->posts()->save($post);
            return redirect('/posts');
        } else abort(404);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
