<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //menampilkan halaman postlogin
    public function postlogin(Request $request){
    	//kondisi login
    	if (Auth::attempt($request->only('email', 'password'))){
            return redirect('/panjalu/admin');
    	}
    	else{
    		return back()->withErrors(['email' => ['Wrong credentials please try again']]);
    	}
    }

    public function reject(){
    	return view('layouts.reject');
    }

    public function logout(){
        Auth::logout();
        return redirect(url('/login'));
    }

    public function register(){
    	return redirect(url('/login'));
    }
}
