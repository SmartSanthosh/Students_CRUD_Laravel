<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class LoginController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('login');
        }
        return redirect('lists');
    }

    public function checklogin(Request $request){
        $this->validate($request,[
             'email' => 'required|email',
             'password' =>'required|alphaNum|min:3',
        ]);
        $user_data =array(
             'email' => $request ->get('email'),
             'password' => $request ->get('password'),
        );
        if(Auth::attempt($user_data)){
            return redirect('lists');
        }
        else{
            return back()->with('error','Wrong Login Details');
        }
    }

    public function logout () {
        \Auth::logout();
        return redirect('/login');
    }
}
