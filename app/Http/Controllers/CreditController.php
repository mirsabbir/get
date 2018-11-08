<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function index(){
        
    }
    public function done(Request $request){
        $it = \App\Item::find($request->item);
        $it->status = 1;
        $user = \App\User::find($it->user_id);
        $user->credit += $it->price;
        $user->save();
        $it->save();
        return redirect('/file/show');
    }
}
