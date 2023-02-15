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
        //dd(request()->all());
        $user = User::create(
            array_merge(request()->all(), ['password' => password_hash('password', PASSWORD_DEFAULT)])
        );
        $user->save();
        return redirect("create_new_user");
    }
}
