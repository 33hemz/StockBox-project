<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

class AdminController extends Controller
{
    public function index(){
        return view("create_new_user", ['companies' => Company::all()]);
    }
    public function processNewUser(){
        validator(request()->all(), [
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'email' => 'required|email|unique:users',
            'company_id' => 'required'
            
        ],
        [
            'company_id.required' => 'The company field is required.'    
        ]
        )->validate();
    

        $user = User::create(
            array_merge(request()->all(), 
            ['password' => password_hash('password', PASSWORD_DEFAULT)])
        );
        $user->save();
        return redirect(route("create_new_user"));
    }
    public function addNewCompany(){
        validator(request()->all(), [
            'company_name' => 'required|min:5|max:20'      
        ]) ->validate();

        $company = Company::create(request()->all());
        $company->save();

        return redirect(route("create_new_user"));
    }
    
}