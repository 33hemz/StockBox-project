<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("create_new_user");
    }
    public function processNewUser(){
        return redirect("create_new_user");
    }
}
