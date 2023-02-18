<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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

    // form prompting user for email address
    public function forgotPassword() {
        return view('forgot_password.forgot_password');
    }

    // check email address and send email if valid
    public function processForgotPassword() {
        validator(request()->all(), [
            'email' => 'required|email'
        ])->validate();
        

        //Password::sendResetLink(request()->email);

        return view('forgot_password.forgotPasswordSuccess');
    }

    // form for allowing user to set a new password
    public function enterNewPassword() {
        // TODO: check if user has requested a password reset
        return view('forgot_password.enterNewPassword');
    }


    public function login() {
        validator(request()->all(), [
            'username' => 'required',
            'password' => 'required'
        ])->validate();

        if(auth()->attempt(request()->only('username', 'password'))){
            return redirect('dashboard');
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Password is incorrect'
            ])->withInput();
        }
    }


}
