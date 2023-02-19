<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view("create_new_user");
    }
    public function processNewUser(){
        validator(request()->all(), [
            // 'company' => 'required|min:5|max:20',
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'email' => 'required|email|unique:users'
        ]) ->validate();

        $user = User::create(
            array_merge(request()->all(), ['password' => password_hash('password', PASSWORD_DEFAULT)])
        );
        $user->save();
        return redirect(route("create_new_user"));
    }
}
