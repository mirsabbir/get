<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('user');
    }
    public function index()
    {
        return view('profile');
    }
    public function user(User $user)
    {   
        if($user->id==\Auth::id()){
            return redirect('/profile');
        }
        $user->load('posts');
        return view('user')->with([
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        if($request->name){
            \Auth::user()->name = $request->name;
            \Auth::user()->save();
        }
        if($request->image){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            \Auth::user()->image = '/images/'.$name;
            \Auth::user()->save();
        }
        if($request->details){
            \Auth::user()->details = $request->details;
            \Auth::user()->save();
        }
        if($request->website){
            \Auth::user()->website = $request->website;
            \Auth::user()->save();
        }
        if($request->email){
            \Auth::user()->email = $request->email;
            \Auth::user()->save();
        }
        
        return redirect('/profile');
    }

}
