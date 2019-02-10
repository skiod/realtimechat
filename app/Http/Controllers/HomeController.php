<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('home');
    }

    public function cccv(){
        $val = 1;
        return view('welcome')->with('val',$val);
    }

    public function sendMsg(Request $request){
            broadcast(new \App\Events\SendMessage(auth()->user(),$request['msg']));

    }

}
