<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function order(){
        $or = \Auth::user()->items()->where('status','0')->get();
        return view('orders')->with([
            'items' => $or,
        ]);
    }
    public function dis(Request $request, \App\User $user){

        return view('delivery')->with([
            'user' => $user,
            'itemid' => $request->itemid,
        ]);
    }
}
