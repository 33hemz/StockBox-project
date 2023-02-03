<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view("login");
    }

    public function login() {
    
        validator(request()->all(), [
            'username' => 'required',
            'password' => 'required'
        ]) ->validate();

        return redirect('dashboard');
    }
}
