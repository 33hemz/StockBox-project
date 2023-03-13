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
        $user = $toDelete = User::find(request()['user_id']);
        $toDelete->delete();
        return redirect(route('manage_user'))->with('danger', 'User \'' . $user->first_name . ' ' . $user->last_name . '\' deleted.');
        
    } 

    public function editUser($id){
        $companies = Company::all();
        $user = User::find($id); // Check if user exists
        return view('edit_user', [
            'user' => $user,
            'companies' => $companies,
        ]);
    } 

    public function processEditUser() {

        $data = request()->validate([
            'first_name' => 'required|min:2|max:30',
            'last_name' => 'required|min:2|max:30',
            'email' => 'required|email',
            'company_id' => 'required'
        ]);
        $user = User::find(request()['user_id']);
        $user->update([
            'first_name' => request()['first_name'],
            'last_name' => request()['last_name'],
            'email' => request()['email'],
            'company_id' => request()['company_id'],
        ]);

        if ($user->wasChanged()) {
            return redirect(route('manage_user'))->with('success', 'User \'' . $user->first_name . ' ' . $user->last_name . '\' updated successfully.');
        }
        else {
            return back()->with('warning', 'User not updated.');
        }
        
    }

}
