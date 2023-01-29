<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //login 
    public function login_index() {
        return view('login');
    }

    //login store 
    public function login_store(Request $request) {
        $request->validate(
            [
               'email' => 'required', 
               'password' => 'required|min:4', 
            ]
        );
        $crendentials = $request->only('email','password');
        // dd($crendentials);


        if(Auth::attempt($crendentials)) {
            return redirect('/');
        }

        dd("Invalid Username or Password !");

    }

}
