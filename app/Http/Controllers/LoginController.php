<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

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
            'email' => 'required',
            'password' => 'required'
        ])->validate();

        if(auth()->attempt(request()->only('email', 'password'))){
            return redirect(route('dashboard'));
        } else {
            return redirect()->back()->withErrors([
                'password' => 'Email or password is incorrect'
            ])->withInput();
        }
    }

    // --- PASSWORD RESETS ---
    // form prompting user for email address
    public function forgotPassword() {
        return view('forgot_password.forgot_password');
    }

    // check email address and send email if valid
    public function processForgotPassword() {
        validator(request()->all(), [
            'email' => 'required|email'
        ])->validate();


        $status = Password::sendResetLink(request()->only('email'));

        return $status === Password::RESET_LINK_SENT
                ? view('forgot_password.forgot_password_success')
                : back()->withErrors(['email' => __($status)]);
    }

    public function processNewPassword() {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ]);
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect(route('login'))
                    : back()->withErrors(['email' => [__($status)]]);
    }

}
