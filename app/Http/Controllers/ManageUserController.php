<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class ManageUserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('manage_user', [
            'users' => $users
        ]);
     }
    public function deleteUser(){
        $users = User::find(request()['user_id'])->delete();
        return redirect(route('manage_user'));
    } 

    public function editUser($id){
        $companies = Company::all();
        $user = User::find($id); // Check if user exists
        return view('edit_user', [
            'user' => $user,
            'companies' => $companies,
        ]);
    } 

}
