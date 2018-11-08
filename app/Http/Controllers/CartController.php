<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show','add']);
    }
    public function show(Request $request){
        if(!session()->has('cart')){
            $a = [];
            session()->put('cart',$a);
        }
        return view('cart');
    }

    public function add(Request $request){
        if(!session()->has('cart')){
            $a = [];
            session()->put('cart',$a);
        }
        $r = session('cart');
        $r[count($r)] = \App\Post::findOrFail($request->item);
        $request->session()->put('cart',$r);
        session()->put('tot',session('tot')+\App\Post::findOrFail($request->item)->price);
        return redirect()->back();
    }

    public function checkout(Request $request){
        return view('checkout');
    }
    public function charge(Request $request){
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_pLdD35Uz4uRIFP8NPx5F9sDR");

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:

        
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => session('tot'),
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
            'receipt_email' => \Auth::user()->email,
        ]);
        
        if($charge->outcome->seller_message=="Payment complete."){
            $invoice = new \App\Invoice;
            $invoice->price = session('tot');
            $invoice->name = \Auth::user()->name;
            $invoice->email = \Auth::user()->email;
            $invoice->save();
            \Mail::to(\Auth::user()->email)->send(new \App\Mail\SendInvoice($invoice,session('cart')));
            
            $ord = new \App\Order;
            $ord->status = 0;
            \Auth::user()->orders()->save($ord);
            for($i=0;$i<count(session('cart'));$i++){
                $p = session('cart')[$i];
                $it = new \App\Item;
                $it->title = $p->title;
                $it->price = $p->price;
                $it->details = $p->details;
                $it->user_id= $p->user_id;
                $it->image = $p->image;
                $it->status = 0;
                $it->orderer = \Auth::user()->id;
                $ord->items()->save($it);
            }
            
            $request->session()->forget('cart');
            $request->session()->forget('tot');
            return redirect('/checkout/complete?payment='.'success');
        }
        
        return redirect('/checkout/complete?payment='.'fail');
       
        
    }
    public function complete(Request $request){
        if($request->payment=="success"){
            return view('success');
        } else {
            return redirect()->back();
        }
    }
}
