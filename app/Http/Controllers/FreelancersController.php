<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreelancersController extends Controller
{
    public function index(){

        return view('freelancers')->with([
            'users' => \App\User::all(),
        ]);

    }
}
