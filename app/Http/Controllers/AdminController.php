<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Product;
use DataTables;

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
            array_merge(
                request()->all(), 
                ['password' => password_hash('password', PASSWORD_DEFAULT)]
            )
        );
        $user->save();
        request()->session()->flash('success', 'User \'' . request()->first_name . ' ' . request()->last_name . '\' was successfully created.');

        return redirect(route("create_new_user"));
    }
    public function addNewCompany(){
        validator(request()->all(), [
            'company_name' => 'required|min:5|max:20|unique:companies'      
        ]) ->validate();

        $company = Company::create(request()->all());
        $company->save();

        request()->session()->flash('success', 'Company \'' . request()->company_name . '\' was successfully created.');

        return redirect(route("create_new_user"));
    }
    public function viewProductData(){
        if (request()->ajax()) {
            $data = Product::all('brand', 'product_name', 'category', 'subcategory', 'price_£', 'price_per', 'ingredients', 'allergen_information', 'recycling_information', 'product_link', 'brand_details');
            return Datatables::of($data)->make(true);
        }

        $product = Product::all();
        return view('view_product_data', ['product_data' => $product]);
    }
    
}