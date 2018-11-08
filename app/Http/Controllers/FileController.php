<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request,\App\User $user){
        $f = new \App\file;
        $file = $request->file('file');
        $file->move('uploads', $file->getClientOriginalName());
        $f->name = 'uploads/'.$file->getClientOriginalName();
        $f->user_id = $user->id;
        $f->sender_id = \Auth::id();
        $f->details = $request->details;
        $f->item_id = $request->itemid;
        $f->save();
        return redirect('orders');
    }
    public function show(Request $request){
        
        return view('download')->with([
            'files' => \App\File::where('user_id',\Auth::id())->get(),
        ]);
    }
    public function down(Request $request){
        $pathToFile = public_path($request->file);
        return response()->download($pathToFile);
    }

    public function single(Request $request,\App\File $file){
        return view('single')->with([
            'file' => $file,
        ]);
    }

}
