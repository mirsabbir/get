<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function thread(Request $request,\App\User $user){
        if(count(\Auth::user()->threads()->where('p_id', $user->id)->with('messages')->get())==0){
            $thread = new \App\Thread;
            $thread->p_id = $user->id;
            \Auth::user()->threads()->save($thread);
            
            $this->send2($request,$user);



        }
        $threads = \Auth::user()->threads()->where('p_id', $user->id)->with('messages')->firstOrFail();
        return view('thread')->with([
            'thread' => $threads, 
            'user' =>$user
        ]);
    }
    public function send(Request $request,\App\User $user){
        if(count(\Auth::user()->threads()->where('p_id', \Auth::id())->get())==0){
            $thread = new \App\Thread;
            $thread->p_id = \Auth::id();
            $user->threads()->save($thread);
        }
        $msg = new \App\Message;
        $msg->msg = $request->msg;
        $msg->sender = \Auth::id();
        
        $thread1 = $user->threads()->where('p_id', \Auth::id())->first();
        $thread2 = \Auth::user()->threads()->where('p_id', $user->id)->first();
        $thread1->messages()->save($msg);
        $msg2 = new \App\Message;
        $msg2->msg = $request->msg;
        $msg2->sender = \Auth::id();
        $thread2->messages()->save($msg2);
        return redirect('/message/'.$user->id);
    }

    public function send2(Request $request,\App\User $user){
        
        $msg = new \App\Message;
        $msg->msg = 'you are connected on getlance';
        $msg->sender = \Auth::id();
        if(!count(\Auth::user()->threads()->where('p_id', $user->id)->get())){
            $thread = new \App\Thread;
            $thread->p_id = $user->id;
            \Auth::user()->threads()->save($thread);
        }
        $thread1 = $user->threads()->where('p_id', \Auth::id())->first();
        $thread2 = \Auth::user()->threads()->where('p_id', $user->id)->first();
        $thread1->messages()->save($msg);
        $msg2 = new \App\Message;
        $msg2->msg = 'you are connected on getlance';
        $msg2->sender = \Auth::id();
        $thread2->messages()->save($msg2);
        //return redirect('/message/'.$user->id);
    }


    public function inbox(Request $request){
        
        $th = \Auth::user()->threads()->with(['user','messages'])->orderBy('created_at','dsc')->get();
        return view('inbox')->with([
            'threads' => $th,
        ]);
    }

}
