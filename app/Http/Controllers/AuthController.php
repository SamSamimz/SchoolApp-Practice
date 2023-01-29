<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ViewErrorBag;

class AuthController extends Controller
{
    //show register form 
    public function register_index() {
        return view('register');
    }

    //store user data for registration
    public function register_store (Request $request) {
        $validData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:4',
            ]
            );
        DB::table('users')->insert([
            'name' => $validData['name'],
            'email' => $validData['email'],
            'password' => Hash::make($validData['password']),
        ]);

        auth()->attempt(['email' => $validData['email'], 'password' => $validData['password']]);
        return redirect('/');

    }

    //user logout
    public function user_logout() {
        Auth::logout();
        return redirect('/');
    }
}
