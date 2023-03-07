<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

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
        validator(request()->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ])->validate();
     
        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]);
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect(route('login'))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    // -----CREATE PASSWORD-------

    public function createPassword() {
        return view('first_time_login');
    }

    public function processPassword() {
        validator(request()->all(), [
            'password' => 'required|confirmed',
        ])->validate();

        $user = User::find(auth()->user()->id);
 
        $user->password = password_hash(request()->password, PASSWORD_DEFAULT);
        
        $user->init_user = 0;

        $user->save();
        
        
        return(redirect(route('landing')));
    }

}
