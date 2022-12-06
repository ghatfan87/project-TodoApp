<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       $user = $request->only(['email', 'password']); 
       if(Auth::attempt($user)){
            return redirect('/dashboard')->with('islogin','kamu sudah login');
        }else {
            return redirect()->back()->with('failed','Failed Login!');
        }
        
        
    }
}