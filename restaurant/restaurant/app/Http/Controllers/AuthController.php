<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('login');
    }

    public function login (Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == 'user' && $password == '1234') {
            session(['is_logged_in' => true]);
            return redirect('/dashboard');
        }

        return redirect('/login') -> with('error', 'Login gagal');
    }

    
    public function logout(){
        session()->flush();
        return redirect('/');
    }
}

