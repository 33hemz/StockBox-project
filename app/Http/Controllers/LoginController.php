<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        if (auth()->check()){
            return redirect('dashboard');
        }
        else {
            return view('login');
        }
        
    }


    public function login() {
        validator(request()->all(), [
            'username' => 'required',
            'password' => 'required'
        ]) ->validate();

        if(auth()->attempt(request()->only('username', 'password'))){
            return redirect('dashboard');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Password is incorrect'
            ])->withInput();
        }
    }
}
